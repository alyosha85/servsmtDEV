@extends('layouts.admin_layout.admin_layout')
<style>
  table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
      left: 10px !important;
      text-indent: 0 !important;
      background-color: #661421 !important;
  }
  /* prevent blinking tooltip */
  .tooltip {
    pointer-events: none;
  }
  /* datatable - hidden column wrapping */
  .dtr-data {
      white-space:normal
  }
  </style>
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Ordner</h3>

          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item active"><a href="{{route('ticket.usertickets')}}" class="nav-link"><i class="fas fa-inbox"></i> Offene 
                  <span class="badge bg-primary float-right">{{$myTicketsCount}}</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('ticket.userticketsdone')}}" class="nav-link"><i class="far fa-check-circle"></i> Erledigte <span class="badge bg-success float-right">{{$ticketsdone}}</span></a></a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Anzahl offener Tickets: {{$myTicketsCount}} </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-1">
            <div class="mailbox-messages display nowrap" style="width: 100%;">
              <table class="display responsive compact table-sm" id="userticket_table">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th class="text-center">Status</th>
                    @if( auth()->user()->hasRole('Super_Admin'))
                    <th>Erstellt von</th>
                    @else
                    <th>Zugewiesen an</th>
                    @endif
                    <th>Anfrage</th>
                    <th>Das Gerät</th>
                    <th>Priorität</th>
                    <th class="text-right">Erstellt am</th>
                    <th class="none">Beschreibung</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($myTickets as $myTicket)
                <tr>
                  <td></td>
                  <form method="POST" action="{{route('ticket.forceDelete',$myTicket->id)}}" id="delete-ticket-form">
                    @csrf
                    <td><button onclick="return false" id="{{$myTicket->id}}" class="btn show_confirm"><i class="far fa-trash-alt" style="color:#e3342f;"></i></button>
                    </td>
                   </form>
                  
                  <td class="text-center">
                    @if($myTicket->ticket_status_id == 1)
                    <i class="fas fa-circle fa-1x" data-toggle="tooltip" title="Nicht begonnen" style="color:#001B2E"></i>
                    @elseif($myTicket->ticket_status_id == 2)
                    <i class="fas fa-wrench fa-1x" data-toggle="tooltip" title="In Bearbeitung" style="color:#3490DC"></i>
                    @elseif($myTicket->ticket_status_id == 3)
                    <i class="far fa-check-circle fa-1x" data-toggle="tooltip" title="Erledigt" style="color:#285D17"></i>
                    @elseif($myTicket->ticket_status_id == 4)
                    <i class="fas fa-user-friends fa-1x" data-toggle="tooltip" title="Wartet auf jemand anderen" style="color:#F9A620"></i>
                    @elseif($myTicket->ticket_status_id == 5)
                    <i class="fas fa-pause fa-1x" data-toggle="tooltip" title="Zurückgestellt" style="color:#e3342f"></i>
                    @else
                    <i class="far fa-copy fa-1x" data-toggle="tooltip" title="Duplikat" style="color:#285D17"></i>
                    @endif
                  </td>
                  @if( auth()->user()->hasRole('Super_Admin'))
                  <td><a href="{{url ('ticket/'.$myTicket->id)}}">{{@$myTicket->subUser->username}}</a></td>
                  @else
                  <td><a href="{{url ('ticket/'.$myTicket->id)}}">{{@$myTicket->user->username}}</a></td>
                  @endif
                  <td><a href="{{url ('ticket/'.$myTicket->id)}}">{{$myTicket->problem_type}}</a></td>
                  <td><b>{{@$myTicket->invitem->gname}} </b></td>
                  <td>
                    @if($myTicket->priority_id == 1)
                    <!-- <i class="fas fa-circle" data-toggle="tooltip" title="bla bla" style="color:#3490dc"></i> -->
                    <span class="badge badge-pill badge-primary">Niedrig</span>
                    @elseif ($myTicket->priority_id == 2)
                    <!-- <i class="fas fa-circle " data-toggle="tooltip" title="bla bla" style="color:#285D17"></i> -->
                    <span class="badge badge-pill badge-success">Normal</span>
                    @else
                    <!-- <i class="fas fa-circle" data-toggle="tooltip" title="bla bla" style="color:#e3342f"></i> -->
                    <span class="badge badge-pill badge-danger">Hoch</span>
                    @endif
                  </td>
                  <td class="text-right">{{$myTicket->created_at->diffForHumans()}}</td>
                  <td>{!!$myTicket->notizen!!}</td>
                </tr>
                @empty
                  <td class="text-center">
                    <img src="/images/admin_images/no_ticket.png" alt="Kein Ticket">
                  </td>
                @endforelse
                </tbody>
              </table> <!-- /.table -->
            </div><!-- /.mail-box-messages -->
          </div><!-- /.card-body -->
          <div class="card-footer p-0">
            <div class="mailbox-controls">
              <div class="float-right">
                <div class="btn-group">
                </div> <!-- /.btn-group -->
              </div> <!-- /.float-right -->
            </div>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section>


@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#userticket_table').DataTable({
      searching: false, 
      paging: false, 
      info: false,
      responsive: true,
      autoWidth: false,
      columnDefs: [
    { targets: 6, width: "1%" },
    ]
    });

    $('.show_confirm').on('click', function (e) {
            e.preventDefault();
            let ticket_id = $(this).attr('id')
            console.log(ticket_id);
            Swal.fire({
                title: 'sind Sie sicher ?',
                text: "Sie können dies nicht rückgängig machen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#661421',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ja, löschen !',
                cancelButtonText: 'Nein !'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-ticket-form').submit();
                }
            })
        });
} );
</script>

@endsection

