<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\ParticipantTicketTable;
use Illuminate\Support\Facades\Redirect;

class ParticipantTicketTableController extends Controller
{

  function __construct()
  {
    $this->middleware('role:Super_Admin|Teilnehmer_Info')->only('index');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth()->user();
      if(auth()->user()->hasRole('Super_Admin')){
        $participants = ParticipantTicketTable::with('ticket')->orderBy('created_at','DESC')->get();
      }
      else {
      $participants = ParticipantTicketTable::where('location',$user->ort)->orderBy('created_at','DESC')->get();
      }
      return view ('tickets.participant.index',compact('participants'));
    }



    public function index2()
    {
      $user = Auth()->user();
      if(auth()->user()->hasRole('Super_Admin')){
        $participants = ParticipantTicketTable::with('ticket_dir')->get();
        return $participants;
      }
      else {
      $participants = ParticipantTicketTable::where('location',$user->ort)->orderBy('created_at','DESC')->get();
      }
      return view ('tickets.participant.index',compact('participants'));
    }


    // public function participant_delete($id)
    // {
    //   $participant_row = ParticipantTicketTable::findOrFail($id);
    //   $participant_row -> forceDelete(); 
 
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParticipantTicketTable  $participantTicketTable
     * @return \Illuminate\Http\Response
     */
    public function show(ParticipantTicketTable $participantTicketTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParticipantTicketTable  $participantTicketTable
     * @return \Illuminate\Http\Response
     */
    public function edit(ParticipantTicketTable $participantTicketTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParticipantTicketTable  $participantTicketTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParticipantTicketTable $participantTicketTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParticipantTicketTable  $participantTicketTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParticipantTicketTable $participant)
    {
      $participant ->Delete();
      return redirect()->back();
    }
}
