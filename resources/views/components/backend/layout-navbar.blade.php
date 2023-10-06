<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
  
  <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" data-enable-remember="true"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="lang/en" class="nav-link">English</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="lang/vi" class="nav-link">Tiếng Việt</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home')}}" class="nav-link">Frontend</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('maintenance')}}" class="nav-link text-danger">@if ($app->isDownForMaintenance()) Go Live! @else Maintenance @endif</a>
      </li>
    </ul>
  
    <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @auth
    <!-- Profile Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-solid fa-user"></i> &nbsp;
        <span class="float-right text-muted text-bold">{{ auth()->user()->name }}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header text-bold">{{ trans('common.profile')}}</span>
          <div class="dropdown-divider"></div>
          <a href="/profile/{{auth()->user()->id}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>{{ trans('common.changepass')}}
          </a>
          <div class="dropdown-divider"></div>
          <a href="/privilege/{{auth()->user()->id}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> {{ trans('common.privilege')}}
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer text-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
		      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			      @csrf
		      </form>
      </div>
    </li>
    @role('super-admin')
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">7</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">7 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    @endrole
    @endauth
    <!-- Fullscreen Switch -->      
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <!-- Theme Switch -->
    <li class="nav-item">
      <div class="theme-switch-wrapper nav-link">
        <label class="theme-switch" for="checkbox">
          <input type="checkbox" id="checkbox" />
          <span class="slider round"></span>
        </label>
      </div>
    </li>
  </ul>
</nav>  
  <!-- /.navbar -->

  