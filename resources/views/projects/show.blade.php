@extends('layouts.admin_layout.admin_layout')

<style>
  hr.hr-5 {
  border: 0;
  border-top: 3px double #661421;
}
</style>

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <form method="POST" action="{{route('projects.destroy',$project)}}" id="delete-project-form">
              @csrf
              @method('Delete')
            <button onclick="return false" id="$project->id" class="btn btn-danger float-right confirm-popup"><i class="far fa-trash-alt"></i></button>
            </form>
            <div class="col-md-3">
              <button class="btn btn-info float-right"> <i class="fas fa-pencil-alt"></i></button>
              <h4>Project Detail</h4>
            </div>
          </div><!-- /.card-Header -->
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-info">
                    <div class="info-box-content">
                      <span class="info-box-text text-center">Erstellt von</span>
                      <span class="info-box-number text-center mb-0">{{$project->createdby->username}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Erstellt bei</span>
                      <span class="info-box-number text-center text-muted mb-0">{{($project->created_at) ? $project->formatted_created_at :''}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-success">
                    <div class="info-box-content">
                      <span class="info-box-text text-center">Startdatum</span>
                      <span class="info-box-number text-center mb-0">{{($project->start_date) ? $project->formatted_start_date : ''}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-warning">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Enddatum</span>
                      <span class="info-box-number text-center text-muted mb-0">{{($project->end_date) ? $project->formatted_end_date : ''}}<span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                <h3 class="text-primary"> {{$project->name}}</h3>
                <p class="text-muted">{{@$project->description}}</p>
                <br>
  
                <h5 class="mt-5 text-muted">Project files</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                  </li>
                </ul>
                <div class="text-center mt-5 mb-3">
                  <a href="#" class="btn btn-sm btn-primary float-left">Add files</a>
                </div>
              </div>
            </div><!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                </div>
              </div>
            </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
      <div class="col-md-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <a href="{{route('job.create',['project' => $project])}}" class="btn btn-success float-right"> Neue Beschäftigung anlegen</a>
            <h4>Beschäftigungsliste</h4>
          </div><!-- /.card-header -->
          <div class="card-body">
            @foreach($project->jobs as $job)
            <h3>{{@$job->name}}</h3>
            <div class="row mt-4">
              <nav class="w-100 navbar-fixed-top">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                  <a class="nav-item nav-link active" ><strong>{{@$job->workerId->username}}</strong>  &nbsp;<small>Am {{($job->formatted_created_at) ? $project->formatted_created_at : ''}}</small></a>
                </div>
              </nav>
              <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, 
                {{@$job->description}}
                </div>
              </div>
            </div>
            <hr class="hr-5">
            @endforeach
          </div><!-- /.card-body -->
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
      $('.confirm-popup').on('click', function (e) {
        e.preventDefault();
        let project = $(this).attr('id')
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
                $('#delete-project-form').submit();
            }
        })
    });
  } );
  </script>
  
  @endsection

