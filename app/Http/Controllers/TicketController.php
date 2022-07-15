<?php

namespace App\Http\Controllers;

use App\Gart;
use App\User;
use Response;
use App\Place;
use App\Ticket;
use App\InvRoom;
use App\Problem;
use App\InvItems;
use App\Location;
use App\InvAbItem;
use Carbon\Carbon;
use App\TicketStatus;
use App\TicketPriority;
use App\EquipmentProblem;
use Illuminate\Http\Request;
use App\ParticipantTicketTable;
use Laravelista\Comments\Comment;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\ParticipantTicketImport;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use App\Notifications\TicketNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{

  function __construct()
  {
  $this->middleware('role:Super_Admin|Verwaltung')->only('index');
  }

  //! index Ticketanfrage main page//
    public function index()
    {
      list($user,$users,$now)=User::getAll();
      return view('tickets.index',compact('user','now','users'));
    }
    //! Ticket computer //
    public function computer_all()
    {
      return view('tickets.computer.all');
    }
    public function softwareRequest() 
    {
      list($user,$users,$now)=User::getAll();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      return view ('tickets.computer.softwareRequest',compact('user','now','users','computers'));
    }
    public function peripheralRequest() 
    {
      list($user,$users,$now)=User::getAll();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      return view ('tickets.computer.peripheralRequest',compact('user','now','users','computers'));
    }
    public function hardwareRequest() 
    {
      list($user,$users,$now)=User::getAll();
      $machines = Gart::where('id','2')->orwhere('id','3')->orwhere('id','4')->orwhere('id','5')
      ->orwhere('id','13')->orwhere('id','15')->orwhere('id','18')->orwhere('id','17')->orwhere('id','6')->get();
      return view ('tickets.computer.hardwareRequest',compact('user','now','users','machines'));
    }
    public function pc_problems() 
    {
      list($user,$users,$now)=User::getAll();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      return view ('tickets.computer.pc_problems',compact('user','now','users','computers'));
    }
    public function printer_in_out() 
    {
      list($user,$users,$now)=User::getAll();
      $rooms = InvRoom::with('location')->get();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      return view ('tickets.computer.printer_in_out',compact('user','now','users','computers'));
    }
    public function other() 
    {
      list($user,$users,$now)=User::getAll();
      $rooms = InvRoom::with('location')->get();
      $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
      return view ('tickets.computer.other',compact('user','now','users','computers'));
    }

     //! Ticket printer //
     public function printer_all()
     {
      return view('tickets.printer.all');
     }
 
     public function scanner() 
     {
       list($user,$users,$now)=User::getAll();
       $rooms = InvRoom::with('location')->get();
       $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
       return view ('tickets.printer.scanner',compact('user','now','users','computers'));
     }
     public function functuality() 
     {
       list($user,$users,$now)=User::getAll();
       $rooms = InvRoom::with('location')->get();
       $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
       return view ('tickets.printer.functuality',compact('user','now','users','computers'));
     }
     public function errors() 
     {
       list($user,$users,$now)=User::getAll();
       $rooms = InvRoom::with('location')->get();
       $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
       return view ('tickets.printer.errors',compact('user','now','users','computers'));
     }

     //! Ticket users //
     public function users_all()
     {
       return view('tickets.users.all');
     }

     public function employee() 
     {
      list($user,$users,$now)=User::getAll();
      return view ('tickets.users.employee',compact('user','now','users'));
     }

     public function participant() 
     {
      list($user,$users,$now)=User::getAll();
      return view ('tickets.users.participant',compact('user','now','users'));
     }
     public function users_others() 
     {
       $computers = InvItems::where('gart_id','2')->orwhere('gart_id','3')->get();
       list($user,$users,$now)=User::getAll();
       return view ('tickets.users.usersOthers',compact('user','now','users','computers'));
     }

      //! Ticket telephone //
      public function telephone_all()
      {
        list($user,$users,$now)=User::getAll(); 
        return view('tickets.telephone.all',compact('user','now','users'));
      }
      public function tel_changes() 
      {
        $rooms = InvRoom::with('location')->get();
        list($user,$users,$now)=User::getAll();
        return view ('tickets.telephone.tel_changes',compact('user','now','users'));
      }
      
      public function tel_problems() 
      {
        $rooms = InvRoom::with('location')->get();
        list($user,$users,$now)=User::getAll();
        return view ('tickets.telephone.tel_problems',compact('user','now','users'));
      }
      //! Ticket Web //
      public function web_all()
      {
        list($user,$users,$now,$tickets)=User::getAll(); 
        return view('tickets.web.all',compact('user','now','users'));
      }
      public function terminal_tn() 
      {
        list($user,$users,$now)=User::getAll();
        return view('tickets.web.terminal_tn',compact('user','now'));
      }
      public function bbb() 
      {
        list($user,$users,$now)=User::getAll();
        return view('tickets.web.bbb',compact('user','now'));
      }
      public function vtiger() 
      {
        list($user,$users,$now)=User::getAll();
        return view('tickets.web.vtiger',compact('user','now'));
      }
      public function smt() 
      {
        list($user,$users,$now)=User::getAll();
        return view('tickets.web.smt',compact('user','now'));
      }
      public function firmenvz() 
      {
        list($user,$users,$now)=User::getAll();
        return view('tickets.web.firmenvz',compact('user','now'));
      }
      //! Ajax requests //
      public function tel_in_room(Request $request)
      {
        $telephones = InvItems::where('room_id',$request->telephones)->where('gart_id','15')->get();
        return $telephones;
      }
      public function problem_type(Request $request)
      {
        $ticket_id = $request->ticket_id;
        $problems = Problem::where('ticket_type_id',$ticket_id)->get();
        return response()->json(['problems'=>$problems]);
      }

      public function problem_type_machine(Request $request)
      {
        $whatever = $request->problem_type_id;
        $problems = EquipmentProblem::where('problem_id',$whatever)->get();
        return response()->json(['problems'=>$problems]);
      }


      public function dependant_forms(Request $request)
      {
        $problem_id = $request->form_id;
        $contactname = $request->searchbyname;
        $forms = Problem::where('ticket_type_id',$problem_id)->get();
        $searchByName = User::where('name',$contactname)->get();
        if (!empty($searchByName )) {
          return response()->json(['problem_id'=>$problem_id,'searchByName'=>$searchByName]);
        };
        return response()->json(['problem_id'=>$problem_id]);
      }

      public function address()
      {
        $places = Place::pluck('id','pnname')->toArray();
        $locations = Location::with('invrooms')->get()->toArray();
        return ['locations'=>$locations,'places'=>$places];
      }

      public function printer_in_room(Request $request)
      {
        $printers = InvItems::where('room_id',$request->printers)->where('gart_id','5')->get();
        return $printers;
      }

      public function store(Request $request)
      { 
          $admins = User::role('Super_Admin')->get();
          $user = Auth()->user();
          $ticket = New Ticket;
          $ticket -> submitter = $request -> submitter;
          $ticket -> priority_id = $request -> priority;
          $ticket -> tel_number = $request -> tel_number;
          $ticket -> custom_tel_number = $request -> custom_tel_number;
          $ticket -> problem_type = $request -> problem_type;
          $ticket -> gname_id = $request -> searchcomputer;   //* searchcomputer -> gname_id //
          $ticket -> searchsoftware = $request -> searchsoftware;
          $ticket -> software_name = $request -> software_name;
          $ticket -> software_reason = $request -> software_reason;
          $ticket -> pc_laptop_others = $request -> pclaptopsonstiges; //*pc_laptop_others -> pclaptopsonsitges // 
          $ticket -> keyboard = $request -> keyboard;
          $ticket -> mouse = $request -> mouse;
          $ticket -> speaker = $request -> speaker;
          $ticket -> headset = $request -> headset;
          $ticket -> webcam = $request -> webcam;
          $ticket -> monitor = $request -> monitor;
          $ticket -> other = $request -> other;
          $ticket -> geht_nicht_an = $request -> geht_nicht_an;
          $ticket -> blue = $request -> blue;
          $ticket -> black = $request -> black;
          $ticket -> slow_computer = $request -> slow_computer;
          $ticket -> web_cam_problem = $request -> web_cam_problem;
          $ticket -> head_set_problem = $request -> head_set_problem;
          $ticket -> lautsprecher_mal = $request -> lautsprecher_mal;
          $ticket -> keyboard_malfunction = $request -> keyboard_malfunction;
          $ticket -> mouse_mal = $request -> mouse_mal;
          $ticket -> slow_network = $request -> slow_network;
          $ticket -> no_network_drive = $request -> no_network_drive;
          $ticket -> laud_fan = $request -> laud_fan;
          $ticket -> scanner_wrong_folder = $request -> scanner_wrong_folder;
          $ticket -> scanner_not_working = $request -> scanner_not_working;
          $ticket -> scanner_myname_list = $request -> scanner_myname_list;
          $ticket -> location_id = $request -> location_id;
          $ticket -> room_id = $request -> room_id;
          $ticket -> printer_name = $request -> printer_name;
          $ticket -> gart_id = $request -> searchmachine;
          $ticket -> replication_id = $request -> replication_id;
          $ticket -> position_employee = $request -> position_employee;
          $ticket -> abteilung_employee = $request -> abteilung_employee;
          $ticket -> telephone_employee = $request -> telephone_employee;
          $ticket -> outlook = $request -> outlook;
          $ticket -> isplus = $request -> isplus ;
          $ticket -> employee_lastname = $request -> employee_lastname ;
          $ticket -> employee_firstname = $request -> employee_firstname ;
          $ticket -> password_name = $request -> password_name ;
          $ticket -> forgotten = $request -> forgotten ;
          $ticket -> inaktiv = $request -> inaktiv ;
          $ticket -> expiring_date = $request -> expiring_date;
          $ticket -> abgelaufen = $request -> abgelaufen;
          $ticket -> user_oldname = $request -> user_oldname;
          $ticket -> user_newname = $request -> user_newname;
          $ticket -> user_other_username = $request -> user_other_username;
          $ticket -> tel_target_place = $request -> tel_target_place;
          $ticket -> tel_target_room = $request -> tel_target_room;
          $ticket -> current_tel_name = $request -> current_tel_name;
          $ticket -> new_tel_name = $request -> new_tel_name;
          $ticket -> new_tel_number = $request -> new_tel_number;
          $ticket -> bbb_subject = $request -> bbb_subject;
          $ticket -> bbb_username = $request -> bbb_username;
          $ticket -> vtiger_subject = $request -> vtiger_subject;
          $ticket -> vtiger_username = $request -> vtiger_username;
          $ticket -> smt_subject = $request -> smt_subject;
          $ticket -> smt_username = $request -> smt_username;
          $ticket -> firmen_subject = $request -> firmen_subject;
          $ticket -> firmen_username = $request -> firmen_username;
          $ticket -> terminal_name = $request -> terminal_name;
          $ticket -> terminal_datev = $request -> terminal_datev;
          $ticket -> terminal_lexware = $request -> terminal_lexware;
          $description = $request->notizen;
          
          if ($description) {
            $dom = new \DomDocument();
            $dom->loadHtml(utf8_decode($description), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);   
            $images = $dom->getElementsByTagName('img');
              foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list($type, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/upload/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
              }
            $description = $dom->saveHTML();
            $ticket->notizen = $description;
          }


          $ticket->save();

          $notifications = [
            'title' => 'Neues Ticket',
            'ticket_id' => $ticket->id,
            'submitter' => $ticket->subUser->username,
            'problem_type' => $ticket->problem_type,
          ];
          
          Notification::send($admins, new TicketNotification($notifications));
          return redirect()->route('ticket.usertickets');
      }

      public function download_muster()
      {
        $path=public_path('Muster.xlsx');
        return response()->download($path);
      }


    public function store_participant(Request $request){
      $validator=Validator::make($request->all(),[
           'muster'=>'required|max:20000|mimes:xlsx,xls',
       ]);
       if ($validator->fails()) {
        return back()
        ->withErrors($validator);
      }
        $admins = User::role('Super_Admin')->get();
        $ticket = New Ticket;
        $ticket -> submitter = $request -> submitter;
        $ticket -> priority_id = $request -> priority;
        $ticket -> tel_number = $request -> tel_number;
        $ticket -> custom_tel_number = $request -> custom_tel_number;
        $ticket -> problem_type = $request -> problem_type;
        $ticket -> participant_location = $request -> place_id;
        $ticket -> participant_required_at = $request -> participant_required_at;
        $ticket->save();
        Excel::import(new ParticipantTicketImport($ticket->id,$ticket->participant_location), $request->file('muster'));

        $notifications = [
          'title' => 'Neuer Teilnehmer',
          'ticket_id' => $ticket->id,
          'submitter' => $ticket->subUser->username,
          'problem_type' => $ticket->problem_type,
        ];
      Notification::send($admins, new TicketNotification($notifications));
      return redirect()->route('ticket.usertickets');
    }
     
    public function participant_username_update(Request $request)
    {
      $username = ParticipantTicketTable::where('id',$request->password_id)->first();
      $username -> username = $request->username;
      $username->save();
      return $username;
    }

    public function usertickets()
    {
      $user = Auth()->user();
      $myTickets = Ticket::with('invitem.invroom.location.place')->with('printer.invroom.location.place')->where('submitter',$user->id)->orWhere('assignedTo',$user->id)->orderBy('updated_at','DESC')->get();
      //$ticketsdone = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->onlyTrashed()->count();
      $ticketsdone = Ticket::onlyTrashed()->where(function($query) use ($user){
        $query->where('submitter',$user->id)->orWhere('assignedTo',$user->id);
      })->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      return view('tickets.usertickets',compact('user','myTickets','myTicketsCount','ticketsdone'));
    }
    public function userticketshistory()
    {
      $user = Auth()->user();
      $oldTickets = Ticket::onlyTrashed()->with('invitem.invroom.location.place')->with('printer.invroom.location.place')
                                      ->where(function($query) use ($user){
                                      $query->where('submitter',$user->id)
                                      ->orWhere('assignedTo',$user->id)
                                      ->orderBy('deleted_at','desc');})->latest()->get();

      $ticketsdone = Ticket::onlyTrashed()->where(function($query) use ($user){
                                        $query->where('submitter',$user->id)->orWhere('assignedTo',$user->id);
                                        })->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      return view('tickets.userticketsdone',compact('user','oldTickets','myTicketsCount','ticketsdone'));
    }

    public function opentickets()
    {
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::with('subUser')->orderBy('created_at','DESC')->get();
      $AllTicketsCount = Ticket::all()->count();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      $rolf = Ticket::Where('assignedTo',119)->count();
      $basti =Ticket::Where('assignedTo',372)->count();
      $ara = Ticket::Where('assignedTo',1)->count();
      $julian = Ticket::Where('assignedTo',4)->count();
      return view('tickets.admins.open',compact('user','myTickets','AllTicketsCount','admins','UnassignedTicketsCount','myTicketsCount',
    'rolf','basti','ara','julian'));
    }


    public function mammach()
    {
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::with('subUser')->where('assignedTo',4)->orderBy('created_at','DESC')->get();
      $AllTicketsCount = Ticket::all()->count();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',4)->count();
      $rolf = Ticket::Where('assignedTo',119)->count();
      $basti =Ticket::Where('assignedTo',372)->count();
      $ara = Ticket::Where('assignedTo',1)->count();
      $julian = Ticket::Where('assignedTo',4)->count();
      return view('tickets.admins.mammach',compact('user','myTickets','AllTicketsCount','admins','UnassignedTicketsCount','myTicketsCount',
    'rolf','basti','ara','julian'));
    }
    public function basti()
    {
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::with('subUser')->where('assignedTo',372)->orderBy('created_at','DESC')->get();
      $AllTicketsCount = Ticket::all()->count();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',372)->count();
      $rolf = Ticket::Where('assignedTo',119)->count();
      $basti =Ticket::Where('assignedTo',372)->count();
      $ara = Ticket::Where('assignedTo',1)->count();
      $julian = Ticket::Where('assignedTo',4)->count();
      return view('tickets.admins.mammach',compact('user','myTickets','AllTicketsCount','admins','UnassignedTicketsCount','myTicketsCount',
    'rolf','basti','ara','julian'));
    }
    public function rolf()
    {
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::with('subUser')->where('assignedTo',119)->orderBy('created_at','DESC')->get();
      $AllTicketsCount = Ticket::all()->count();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',119)->count();
      $rolf = Ticket::Where('assignedTo',119)->count();
      $basti =Ticket::Where('assignedTo',372)->count();
      $ara = Ticket::Where('assignedTo',1)->count();
      $julian = Ticket::Where('assignedTo',4)->count();
      return view('tickets.admins.mammach',compact('user','myTickets','AllTicketsCount','admins','UnassignedTicketsCount','myTicketsCount',
    'rolf','basti','ara','julian'));
    }
    public function ara()
    {
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::with('subUser')->where('assignedTo',1)->orderBy('created_at','DESC')->get();
      $AllTicketsCount = Ticket::all()->count();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',1)->count();
      $rolf = Ticket::Where('assignedTo',119)->count();
      $basti =Ticket::Where('assignedTo',372)->count();;
      $ara = Ticket::Where('assignedTo',1)->count();
      $julian = Ticket::Where('assignedTo',4)->count();
      return view('tickets.admins.mammach',compact('user','myTickets','AllTicketsCount','admins','UnassignedTicketsCount','myTicketsCount',
    'rolf','basti','ara','julian'));
    }

    public function unassignedtickets()
    {
      $name = 'unassigned';
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::whereNull('assignedTo')->orderBy('updated_at','DESC')->get();
      $UnassignedTicketsCount = Ticket::whereNull('assignedTo')->count();
      $AllTicketsCount = Ticket::all()->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      $rolf = Ticket::Where('assignedTo',119)->count();
      $basti =Ticket::Where('assignedTo',372)->count();;
      $ara = Ticket::Where('assignedTo',1)->count();
      $julian = Ticket::Where('assignedTo',4)->count();
      return view('tickets.admins.unassigned',compact('user','myTickets','UnassignedTicketsCount','admins','myTicketsCount','AllTicketsCount',
      'rolf','basti','ara','julian'));
    }
    public function tickethistory()
    {

      $name = 'ticket history';
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $myTickets = Ticket::onlyTrashed()->orderBy('deleted_at','DESC')->get();
      $done = Ticket::onlyTrashed()->count();
      $AllTicketsCount = Ticket::all()->count();
      $myTicketsCount = Ticket::where('submitter',$user->id)->orWhere('assignedTo',$user->id)->count();
      return view('tickets.admins.tickethistory',compact('user','myTickets','done','admins','myTicketsCount','AllTicketsCount'));
    }

    public function show($id)
    {
      $user = Auth()->user();
      $ticket_status = TicketStatus::all();
      $ticket_priority = TicketPriority::all();
      $ticket = Ticket::with('invitem.invroom.location.place')->with('printer.invroom.location.place')->with('subUser')->withTrashed()->findorFail($id);
      $blade_name = 'tickets.admins.view_ticket_blades.'.str_replace(' ','',strtolower($ticket->problem_type)).'ticket';
      $not = $user->unreadNotifications()->where('data->id',$id)->first();
      if($not){
      $not->markAsRead();
      }

      $createdAt = Carbon::parse($ticket->created_at);
      $telNewRoom = InvRoom::where('id',$ticket->tel_target_room)->first();
      $telNewAddress = Location::where('id',$ticket->tel_target_place)->first();
      $teilnehmers = ParticipantTicketTable::where('ticket_id',$ticket->id)->get();
      return view('tickets.admins.showticket',compact('ticket','createdAt','ticket_status','ticket_priority','telNewRoom','telNewAddress','blade_name','teilnehmers'));
    }

    public function allRead()
    {
      $user = Auth()->user();
      $user->unreadNotifications()->update(['read_at' => now()]);
      return redirect()->back();
    }

    public function assignedTo(Request $request)
    {
      $assigned = Ticket::where('id',$request->ticket_id)->first();
      $assigned -> assignedTo = $request->assignedTo;
      $assigned->save();

      $admins = User::role('Super_Admin')->get();
      foreach ($admins as $admin) {
        $not = $admin->Notifications()->where('data->id',$request->ticket_id)->first();
        if($not){
          $not->markAsRead();
          } 
      }

      $ticket = Ticket::where('id',$request->ticket_id)->first();
      $assignedTo = User::where('id',$ticket->assignedTo)->first();
      $notifications = [
        'title' => 'Zugewiesen an',
        'ticket_id' => $ticket->id,
        'submitter' => $ticket->subUser->username,
        'problem_type' => $ticket->problem_type,
      ];
      Notification::send($assignedTo, new TicketNotification($notifications));
      return $assigned;

    }
    public function ticketPriority(Request $request)
    {
      $priority = Ticket::where('id',$request->ticket_id)->first();
      $priority -> priority_id = $request->priority;
      $priority->save();
      return $priority;
    }
    public function ticketStatus(Request $request)
    {
      $status = Ticket::where('id',$request->ticket_id)->first();
      $status -> ticket_status_id = $request-> status;
      $status->save();
      return $status;
    }
    public function admin_notes(Request $request)
    {
      $admin_notes = Ticket::where('id',$request->ticket_id)->first();
      $admin_notes -> admin_notes = $request-> adminNotes;
      $admin_notes->save();
      return $admin_notes;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $user = Auth()->user();
      $admins = User::role('Super_Admin')->get();
      $ticket = Ticket::findOrFail($id);
      $ticket-> done_by = $user -> username;
      $ticket->save();
      foreach ($admins as $admin) {
        $not = $admin->Notifications()->where('data->id',$id)->first();
        if($not){
          $not->markAsRead();
          }   
      }
      $notifications = [
        'title' => 'Erledigt',
        'ticket_id' => $ticket->id,
        'date' => Carbon::parse($ticket->created_at)->locale('de_DE')->translatedFormat('d F Y H:i'),
        'submitter' => $ticket->subUser->username,
        'problem_type' => $ticket->problem_type,
      ];
      $submitter = $ticket->subUser;
      Notification::send($submitter, new TicketNotification($notifications));

      $ticket -> delete();
      Comment::withTrashed()->where('commentable_id',$id)->restore();
      return redirect()->route('ticket.opentickets');
    }

    public function restore($id)
    {
      $admins = User::role('Super_Admin')->get();
      $ticket =Ticket::withTrashed()->find($id);
      $notifications = [
        'title' => 'Wiederhergestellt',
        'ticket_id' => $ticket->id,
        'date' => Carbon::parse($ticket->created_at)->locale('de_DE')->translatedFormat('d F Y H:i'),
        'submitter' => $ticket->subUser->username,
        'problem_type' => $ticket->problem_type,
      ];
      Comment::withTrashed()->where('commentable_id',$id)->restore();
      Notification::send($admins, new TicketNotification($notifications));
      $ticket->restore();
      return redirect()->route('ticket.opentickets');
    }

    public function forceDelete ($id) {
      $admins = User::role('Super_Admin')->get();
      $ticket = Ticket::findOrFail($id);

      foreach ($admins as $admin) {
        $not = $admin->Notifications()->where('data->id',$id)->first();
        if($not){
          $not->delete();
          }   
      }
      $ticket -> forceDelete();
      return redirect()->route('ticket.usertickets');
    }



    //! video //
    public function video()
    {
      return view('video');
    }

    public function video_index()
    {
      $ticket = ParticipantTicketTable::with('ticket')->orderBy('created_at','DESC')->get();
      return $ticket;
      return view('tickets.video_index',compact(''));
    }
}
