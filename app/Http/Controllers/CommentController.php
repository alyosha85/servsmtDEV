<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Config;
use Spatie\Honeypot\ProtectAgainstSpam;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;
use Laravelista\Comments\CommentControllerInterface;



class CommentController extends Controller implements CommentControllerInterface
{
    public function __construct()
    {
        $this->middleware('web');

        if (Config::get('comments.guest_commenting') == true) {
            $this->middleware('auth')->except('store');
            $this->middleware(ProtectAgainstSpam::class)->only('store');
        } else {
            $this->middleware('auth');
        }
    }

    /**
     * Creates a new comment for given model.
     */
    public function store(Request $request)
    {
        // If guest commenting is turned off, authorize this action.
        if (Config::get('comments.guest_commenting') == false) {
            Gate::authorize('create-comment', Comment::class);
        }

        // Define guest rules if user is not logged in.
        if (!Auth::check()) {
            $guest_rules = [
                'guest_name' => 'required|string|max:255',
                'guest_email' => 'required|string|email|max:255',
            ];
        }

        // Merge guest rules, if any, with normal validation rules.
        Validator::make($request->all(), array_merge($guest_rules ?? [], [
            'commentable_type' => 'required|string',
            'commentable_id' => 'required|string|min:1',
            'message' => 'required|string'
        ]))->validate();

        $model = $request->commentable_type::findOrFail($request->commentable_id);

        $commentClass = Config::get('comments.model');
        $comment = new $commentClass;

        if (!Auth::check()) {
            $comment->guest_name = $request->guest_name;
            $comment->guest_email = $request->guest_email;
        } else {
            $comment->commenter()->associate(Auth::user());
        }

        $comment->commentable()->associate($model);
        $comment->comment = $request->message;
        $comment->approved = !Config::get('comments.approval_required');
      
        $notifications = [
          'title' => 'neuer Kommentar',
          'comment' => $comment->comment,
          'commenter_id' => $comment->commenter->username,
          'id' => $comment->commentable_id,
        ];
        /**
         * first if condition
         * if the commenter is the ticket creater then send the notification to (admins)
         *  second if  
         *  if assigned to is assigned to some of the admins then the notification will go to him only
         *  if assigned to is not assigned (value in db = null) then notification  to all admins
         * else
         * then the comment write is one of the admins so send the notification to ticket submitter.
         */

        if ($comment->commenter_id == $comment->commentable->submitter){  
          if(!$comment->commentable->assignedTo) {
            $admins = User::role('Super_Admin')->get();
            Notification::send($admins, new CommentNotification($notifications)); 
            }else{
              $assignedTo_only = User::where('id', $comment->commentable->assignedTo)->first();
              Notification::send($assignedTo_only, new CommentNotification($notifications));
            }  
        }else{
          $submitter = User::where('id',$comment->commentable->submitter)->first();
          Notification::send($submitter, new CommentNotification($notifications));
        }
          
          
          
        $comment->save();

        return Redirect::to(URL::previous() . '#comment-' . $comment->getKey());
    }

    /**
     * Updates the message of the comment.
     */
    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('edit-comment', $comment);

        Validator::make($request->all(), [
            'message' => 'required|string'
        ])->validate();

        $comment->update([
            'comment' => $request->message
        ]);

        return Redirect::to(URL::previous() . '#comment-' . $comment->getKey());
    }

    /**
     * Deletes a comment.
     */
     public function destroy(Comment $comment)
    {
    //     Gate::authorize('delete-comment', $comment);

    //     if (Config::get('comments.soft_deletes') == true) {
		// 	$comment->delete();
		// }
		// else {
		// 	$comment->forceDelete();
		// }

    //     return Redirect::back();
    }

    /**
     * Creates a reply "comment" to a comment.
     */
    public function reply(Request $request, Comment $comment)
    {
        Gate::authorize('reply-to-comment', $comment);

        Validator::make($request->all(), [
            'message' => 'required|string'
        ])->validate();

        $commentClass = Config::get('comments.model');
        $reply = new $commentClass;
        $reply->commenter()->associate(Auth::user());
        $reply->commentable()->associate($comment->commentable);
        $reply->parent()->associate($comment);
        $reply->comment = $request->message;
        $reply->approved = !Config::get('comments.approval_required');

        $notifications = [
          'title' => 'Kommentarantwort',
          'id' => $reply->commentable_id,
          'comment' => $reply->comment,
          'commenter_id' => $reply->commenter->username,
        ];

        $reply_to = User::where('id',$reply->parent->commenter_id)->first();
        Notification::send($reply_to, new CommentNotification($notifications));
        $reply->save();

        return Redirect::to(URL::previous() . '#comment-' . $reply->getKey());
    }
}
