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
            <h3 class="card-title">Project Status Stat</h3>

          </div>
          <div class="card-body m-1">
            <div class="col-lg-12 col-12">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>progress</p>
                </div>
                <div class="icon">
                  <i class="fas fa-running"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-12">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>150</h3>
                  <p>Done</p>
                </div>
                <div class="icon">
                  <i class="far fa-thumbs-up"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-12">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3>150</h3>
                  <p>On hold</p>
                </div>
                <div class="icon">
                  <i class="fas fa-hand-paper"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-12">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>150</h3>
                  <p>Cancelled</p>
                </div>
                <div class="icon">
                  <i class="far fa-frown"></i>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <a href="{{route('projects.create')}}" class="btn btn-success float-right">Neues Projekt erstellen</a>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive mailbox-messages">
              <table class="table table-hoover table-striped" width="100%" id="project_table">
                <thead>
                  <tr class="text-center">
                    <th></th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Zugewiesen an</th>
                    <th>Startdatum</th>
                    <th>Enddatum</th>
                    <th>Erstellt von</th>
                    <th>Hergestellt in</th>
                    <th class="none">Beschreibung</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($projects as $project)
                  <tr class="text-center">
                    <td></td>
                    <td><span><a href="{{route ('projects.show',$project)}}">{{$project->name}}</a></span></td>
                    <td>status</td>
                    <td>{{@$project->assignedTo->username}}</td>
                    <td>{{($project->start_date) ? $project->formatted_start_date : ''}}</td>
                    <td>{{($project->end_date) ? $project->formatted_end_date : ''}}</td>
                    <td>{{$project->createdby->username}}</td>
                    <td>{{$project->created_at->format('d.m.Y ')}}</td>
                    <td>{{$project->description}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table><!-- /.table -->
            </div><!-- /.mail-box-messages -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer p-0">
            <div class="mailbox-controls">
              <div class="float-right">
              </div>
            </div>
          </div>
        </div> <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section>


@endsection
@section('script')

<script>
  $(document).ready(function() {
    $('#project_table').DataTable({
      searching: false, 
      pageLength: 50,
      paging: true, 
      info: true,
      responsive: true,
      autoWidth: true,
      columnDefs: [
          { targets: 1, width: "40%"},
      ],
      bInfo: true,
    "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
        }
    });
  });
</script>

@endsection

