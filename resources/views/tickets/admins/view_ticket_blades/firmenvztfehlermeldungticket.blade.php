<div class="invoice col-md-12 p-3 mb-3">
  <div class="row text-center">
    <div class="col-12">
      <h4 class="ticket_header">{{$ticket->problem_type}}</h4>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-sm-6 invoice-col">
      Betreff
      <address>
        <u class="mt-1"><strong>{{$ticket->firmen_subject}}</strong></u><br>
      </address>
    </div>
    <div class="col-sm-6 invoice-col">
      Name
      <address>
        <u class="mt-1"><strong>{{$ticket->firmen_username}}</strong></u><br>
      </address>
    </div>