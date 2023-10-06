<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center">

        <a href="/" class="logo me-auto"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/" class="@yield('cur_home')">{{ trans('common.home') }}</a></li>    
                <li><a href="{{route('nguoi.view', [1])}}" class="@yield('cur_giapha')">{{ trans('ngkhoa.giapha') }}</a></li>
                <li><a href="/bai-viet/nguon-goc" class="@yield('cur_source')">{{ trans('ngkhoa.source') }}</a></li>
                <li><a href="/bai-viet/danh-nhan" class="@yield('cur_celeb')">{{ trans('ngkhoa.celeb') }}</a></li>
                <li><a href="/bai-viet/thong-tin" class="@yield('cur_info')">{{ trans('common.info') }}</a></li>
                <li><a href="{{ route('hinh-anh') }}" class="@yield('cur_gallery')">{{ trans('common.gallery') }}</a></li>
                <li><a href="{{ route('lien-he') }}" class="@yield('cur_contact')">{{ trans('common.contact')}}</a></li>
            @guest

                <li><a href="{{ route('login') }}" class="getstarted"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;{{ trans('common.login')}}</a></li>
            @endguest
            @auth

                <li class="dropdown"><a href="#"><i class="far fa-solid fa-user"></i> &nbsp;<span>{{ auth()->user()->name }}</span></a>
                    <ul>
                        <li><a href="{{ route('profile.show') }}"><span>{{ trans('common.profile')}}</span><i class="fa-solid fa-user"></i></a></li>                            
                    @if(auth()->user()->nguoi != null)
                        <li><a href="{{ route('family.nguoiShow', [auth()->user()->nguoi->MaNguoi]) }}"><span>{{ trans('common.family')}}</span><i class="fa-solid fa-group"></i></a></li>
                    @endif
                    @role('admin|super-admin|user')

                        <li><a href="{{ route('dashboard') }}"><span>{{ trans('common.dashboard')}}</span></a></li>
                    @endrole                            
                        <li><a href="/profile/{{auth()->user()->id}}"><span>{{ trans('common.changepass')}}</span> </a></li>
                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span>{{ trans('common.logout')}}</span></a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            
                        </form>
                    </ul>
                </li>    
                @endauth                    
            </ul>
            <i class="fa-solid fa-bars mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>
<!-- End Header -->