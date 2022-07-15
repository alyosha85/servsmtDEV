<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TicketNotification extends Notification
{
    use Queueable;
    protected $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($notifications)
    {
        $this->myData = $notifications;

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
      $url = url('http://servsmt.miqr.local/ticket/'.$this->myData['ticket_id']);
      $ersteller = $this->myData['submitter'];
      $problem_type = $this->myData['problem_type'];
        $response =  (new MailMessage);
                    
        if($this->myData['title'] === 'Neues Ticket' || $this->myData['title'] === 'Neuer Teilnehmer' ){
          $response->subject('Ticketbenachrichtigung')
                   ->line('Ein neues Ticket wurde von '. $ersteller .' eingereicht')
                   ->line($problem_type)
                   ->action('anzeigen', $url);
        }
        if($this->myData['title'] === 'Zugewiesen an'){
          $response->subject('Ticketbenachrichtigung')
                   ->line('Sie wurden für die folgende Aufgabe zugewiesen')
                   ->line($problem_type)
                   ->action('anzeigen', $url);
        }
        if($this->myData['title'] === 'Wiederhergestellt'){
          $date = $this->myData['date'];
          $response->subject('Ticketbenachrichtigung')
                   ->line('Das Ticket, das von ' . $ersteller . ' am ' . $date . ' eingereicht wurde, wird wiederhergestellt.')
                   ->line($problem_type)
                   ->action('anzeigen', $url);
        }
        if($this->myData['title'] === 'Erledigt'){
          $response->subject('Ticketbenachrichtigung')
                   ->line('Ihr eingereichtes Ticket wird als erledigt markiert ')
                   ->line($problem_type)
                   ->action('anzeigen', $url);
        }
        return $response;
    }

    public function toDatabase($notifiable)
    {
        return [
          'title' => $this->myData['title'],
          'id' => $this->myData['ticket_id'],
          'ersteller' => $this->myData['submitter'],
          'problem_type' => $this->myData['problem_type'],
        ];

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }

}
