  <!-- Navbar -->
  <style>
    .dropdown-item {
      width: 300px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
}
  </style>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#661421" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
          </a>
      </li>
      @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Super_Admin'))
      <!-- Disable Logout for SSO (windows Authentication) -->
       <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link float-right"  href="{{ route('ticket.unassigned') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#5b21b6" d="M18.6 6.62c-1.44 0-2.8.56-3.77 1.53L12 10.66 10.48 12h.01L7.8 14.39c-.64.64-1.49.99-2.4.99-1.87 0-3.39-1.51-3.39-3.38S3.53 8.62 5.4 8.62c.91 0 1.76.35 2.44 1.03l1.13 1 1.51-1.34L9.22 8.2C8.2 7.18 6.84 6.62 5.4 6.62 2.42 6.62 0 9.04 0 12s2.42 5.38 5.4 5.38c1.44 0 2.8-.56 3.77-1.53l2.83-2.5.01.01L13.52 12h-.01l2.69-2.39c.64-.64 1.49-.99 2.4-.99 1.87 0 3.39 1.51 3.39 3.38s-1.52 3.38-3.39 3.38c-.9 0-1.76-.35-2.44-1.03l-1.14-1.01-1.51 1.34 1.27 1.12c1.02 1.01 2.37 1.57 3.82 1.57 2.98 0 5.4-2.41 5.4-5.38s-2.42-5.37-5.4-5.37z"/></svg>
      </a>
      </li> 
      @endif
    </ul>
    <!-- <ul class="navbar-nav ml-auto"> 
      @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Super_Admin'))
       Disable Logout for SSO (windows Authentication) 
       <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link float-right"  href="{{ route('ticket.opentickets') }}">
          <i class="fas fa-clipboard-list fa-2x"></i>
      </a>
      </li> 
      @endif
     </ul> -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <div id="notification_bell">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="#661421" d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/></svg>
            @if(auth()->user()->unreadnotifications->count())
            <span class="badge badge-warning navbar-badge" id="notifciation_count">{{auth()->user()->unreadnotifications->count()}}</span>
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <p class="dropdown-item">Sie haben {{auth()->user()->unreadnotifications->count()}} neue Benachrichtigungen </p>
            @foreach(auth()->user()->unreadnotifications as $notification)
              @if($notification->type === "App\Notifications\TicketNotification")
              <a href="{{url ('ticket/'.$notification->data['id'])}}" class="dropdown-item">
                <i class="fas fa-paperclip mr-2" style="color:#461b23"></i> {{@$notification->data['title']}}<br>
                <i class="far fa-user mr-2" style="color:#461b23"></i> {{@$notification->data['ersteller']}}<br>
                <i class="fas fa-question-circle mr-2" style="color:blue;"></i> {{@$notification->data['problem_type']}}<br>
                <i class="fas fa-hourglass-start mr-2" style="color:green"></i> {{@$notification->updated_at->diffForHumans()}}<br>
              </a>
              @elseif($notification->type === "App\Notifications\CommentNotification")
              <a href="{{url ('ticket/'.$notification->data['id'])}}" class="dropdown-item">
                <i class="fas fa-paperclip mr-2" style="color:#461b23"></i> {{@$notification->data['title']}}<br>
                <i class="far fa-user mr-2" style="color:#461b23"></i> {{@$notification->data['commenter']}}<br>
                <i class="far fa-comment-alt mr-2" style="color:indigo;"></i> {{@$notification->data['comment']}}<br>
                <i class="fas fa-hourglass-start mr-2" style="color:green"></i> {{@$notification->updated_at->diffForHumans()}}<br>
              </a>
              @endif
              <hr>
            <!-- <div class="dropdown-divider"></div> -->
            @endforeach
            @if(auth()->user()->unreadnotifications->count())
            <a href="{{route ('allRead')}}" style="color:green;" class="ml-2">Mark all as Read</a>
            @endif
          </div>
        </div>
      </li>
    </ul>

    
  </nav>
  <!-- /.navbar -->


  

