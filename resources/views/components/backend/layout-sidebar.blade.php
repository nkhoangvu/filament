  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link logo-switch">
      <img src="/assets/img/logo-small.png" alt="Logo Small" class="brand-image-xl logo-xs">
      <img src="/assets/img/logo_backend.png" alt="Logo Large" class="brand-image-xs logo-xl" style="left: 5px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     <!-- SidebarSearch Form -->
     <form id="searchForm" class="form-horizontal" action="{{ route('search.all') }}" method="GET" enctype="multipart/form-data">
      @csrf
      <div class="form-inline">
        <div class="input-group">
          <input class="form-control form-control-sidebar" type="search" placeholder="{{ trans('common.search') }}" aria-label="Search" name="search">
          <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
     </form>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link @yield('homesidebar')">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                <i class="right badge badge-danger"></i>
              </p>
            </a>          
          </li>
          <li class="nav-item">
            <a href="{{ route('nguoi.index')}}" class="nav-link @yield('nguoi_sb')">
              <i class="fas nav-icon fa-solid fa-people-group"></i>
              <p>{{ trans('ngkhoa.nguoi')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('daure.index')}}" class="nav-link @yield('daure_sb')">
              <i class="fas nav-icon fa-solid fa-people-arrows"></i>
              <p>{{ trans('ngkhoa.daure')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('phoingau.index') }}" class="nav-link @yield('phoingau_sb')">
              <i class="fas nav-icon fa-solid fa-venus-mars"></i>
              <p>{{ trans('ngkhoa.phoingau')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ngoai.index') }}" class="nav-link @yield('ngoai_sb')">
              <i class="fas nav-icon fa-solid fa-person"></i>
              <p>{{ trans('ngkhoa.ngoai')}}</p>
            </a>
          </li>
          <!-- Other Information -->
          <li class="nav-header">{{ strtoupper(trans('common.other_info'))}}</li>
          <li class="nav-item">
            <a href="{{ route('chucvi.index')}}" class="nav-link @yield('chucvi_sb')">
              <i class="fas nav-icon fa-solid fa-award"></i>
              <p>{{ trans('ngkhoa.chucvi')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('phongtang.index') }}" class="nav-link @yield('phongtang_sb')">
              <i class="fas nav-icon fa-solid fa-medal"></i>
              <p>{{ trans('ngkhoa.phongtang')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('motang.index') }}" class="nav-link @yield('motang_sb')">
              <i class="fas nav-icon fa-solid fa-building-columns"></i>
              <p>{{ trans('ngkhoa.motang')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('page.index') }}" class="nav-link @yield('trang_sb')">
              <i class="fas nav-icon fa-solid fa-file"></i>
              <p>{{ trans('ngkhoa.page')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('baiviet.index') }}" class="nav-link @yield('baiviet_sb')">
              <i class="fas nav-icon fa-solid fa-file-lines"></i>
              <p>{{ trans('ngkhoa.baiviet')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tag.index') }}" class="nav-link @yield('tag_sb')">
              <i class="fas nav-icon fa-solid fa-file-lines"></i>
              <p>{{ trans('common.tag')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('lienket.index') }}" class="nav-link @yield('lienket_sb')">
              <i class="fas nav-icon fa-solid fa-link"></i>
              <p>{{ trans('ngkhoa.lienket')}}</p>
            </a>
          </li>
          <!-- System Management -->
          <li class="nav-header">{{ strtoupper(trans('common.sys_manage')) }}</li>
          <li class="nav-item @yield('user_main_sb')">
            <a href="#" class="nav-link">
              <i class="far nav-icon fa-solid fa-users"></i>
                <p>{{ trans('common.user_manage')}}
                  <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">          
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link @yield('user_sb')">
                  <i class="fas nav-icon fa-solid fa-user"></i>
                  <p>{{ trans('common.user')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link @yield('role_sb')">
                  <i class="fas nav-icon fa-solid fa-unlock-keyhole"></i>
                  <p>{{ trans('common.role')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link @yield('permission_sb')">
                  <i class="fas nav-icon fa-solid fa-key"></i>
                  <p>{{ trans('common.permission')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('group.index') }}" class="nav-link @yield('group_sb')">
                  <i class="fas nav-icon fa-solid fa-building-user"></i>
                  <p>{{ trans('common.group')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('trash.index') }}" class="nav-link @yield('trash_sb')">
              <p><i class="fa-solid fa-trash-can nav-icon"></i>{{ trans('common.trash')}}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('log') }}" class="nav-link @yield('log_sb')">
            <i class="fas nav-icon fa-solid fa-gears"></i>
            <p>{{ trans('common.log')}}</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>