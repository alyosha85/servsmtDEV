<?php

namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotification extends Notification
{
    use Queueable;
    protected $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($comment)
    {
        $this->myComment = $comment;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
      $url = url('http://servsmt.miqr.local/ticket/'.$this->myComment['id']);
      $replier = $this->myComment['commenter_id'];
      $comment_body = $this->myComment['comment'];
        return (new MailMessage)
                    ->subject('Kommentarantwort')
                    ->line( $replier . ' hat auf deinen Kommentar geantwortet.')
                    ->line($comment_body)
                    ->action('anzeigen', $url);
    }

    public function toDatabase($notifiable)
    {
        return [
          'title' => $this->myComment['title'],
          'id' => $this->myComment['id'], //commentable_id
          'comment' => $this->myComment['comment'],
          'commenter' => $this->myComment['commenter_id'],
        ];

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
