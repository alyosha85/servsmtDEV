@extends('layouts.admin_layout.admin_layout')

<style>

</style>
@section('content')
<!-- Main content -->
<section class="content-fluid">
  <div class="row">
    <div class="col-md-11 mx-auto"></div>
    <!-- /.col -->
    <div class="col-md-11 mx-auto">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title text-bold"></h3>
          <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#bentuzer_liste">
            Video Anschauen
          </a>  
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="mailbox-messages display nowrap" style="width: 100%;">
            <table class="display responsive compact table-sm" id="participant_list_table">
              <thead>
                <tr class="text-center">
                  <th>Vorname</th>
                  <th>Nachname</th>
                  <th>Benutzername</th>
                  <th>Passwort</th>
                  <th>Maßnahme</th>
                  <th>Email</th>
                  <th>Erstellt am</th>
                  <th>Erledigt am</th>
                  <th>Erledigt von</th>
                </tr>
              </thead>
              <tbody>
                @foreach($participants as $participant)
                <tr class="text-center">
                  <td>{{$participant->vorname}}</td>
                  <td>{{$participant->nachname}}</td>
                  <td style="font-weight: bold;">{{$participant->username}}</td>
                  <td>{{$participant->password}}</td>
                  <td>{{@$participant->course}}</td>
                  <td>{{@$participant->email}}</td>
                  <td style="color: blue;">{{\Carbon\carbon::parse($participant->ticket['created_at'])->format('d-m-Y') }}</td>
                  <td style="color: green;">{{$participant->created_at ? $participant->formatted_created_at : ''}}</td>
                  <td>{{@$participant->ticket['done_by']}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- /.table -->
          </div>
          <!-- /.mail-box-messages -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer p-0">
          <div class="mailbox-controls">
            <div class="float-right">
              <div class="btn-group">
                <!-- <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button> -->
              </div>
              <!-- /.btn-group -->
            </div>
            <!-- /.float-right -->
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
<!-- Modal -->
<div class="modal fade" id="bentuzer_liste" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog" style="max-width: 1200px !important;" >
    <div class="modal-content container">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <video
          fluid="true"
          id="my-video"
          class="video-js vjs-theme-city"
          controls
          preload="auto"
          width="600"
          height="400"
          data-setup="{}"
        >
          <source src="/images/admin_images/Teilnehmer_liste.mp4" type="video/mp4" />
        </video>
      </div>
    </div>
  </div>
</div>



</section>

@endsection @section('script')
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
<script>
  $(document).ready(function () {
    $("#participant_list_table").DataTable({
      language: {
        url: "//cdn.datatables.net/plug-ins/1.10.18/i18n/German.json",
      },
      //order: [[7, "desc"]],
      bSort: false,
      dom: "Bfrtip",
      pageLength: 50,
      responsive: true,
      autoWidth: false,
      columnDefs: [
        {
          targets: 0,
          checkboxes: {
            selectRow: true
          }
        }
      ],
      buttons: [
        { 
          extend: 'copy', 
          className: 'btn btn-outline-primary',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
         },
        { 
          extend: 'csv', 
          className: 'btn btn-outline-primary',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
        },
        { 
          extend: 'excel', 
          className: 'btn btn-outline-primary', 
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
        },
        { 
          extend: 'pdf', 
          className: 'btn btn-outline-primary', 
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
          }
        },
        {
          extend: "print",
          text: "Auswahl drucken",
          className: 'btn btn-outline-primary',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
            modifier: {
              selected: true,
              search: "none"
            }
          }
        },
        {
          extend: "print",
          text: "Alle drucken (nicht nur ausgewählte)",
          className: 'btn btn-outline-primary',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4 ],
            modifier: {
              selected: null
            }
          }
        }
      ],
      select: {
        style: "os"
      },

      // initComplete: function () {
      //     console.log('@@@ init complete @@@');
      //     $("body").removeClass("loading");
      //   }
    });
  });

$('body').on('hidden.bs.modal', '.modal', function () {
$('video').trigger('pause');
});
</script>

@endsection
