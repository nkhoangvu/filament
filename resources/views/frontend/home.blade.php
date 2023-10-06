@extends('layouts.frontend.default')

@section($current, 'active')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-stroke all-cap">@yield('pageTitle')</h2>
                <ol>
                    <li><a href="/">{{ trans('common.home') }}</a></li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-9 entries">
                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            <a href="#">{{ $data->title }}</a>
                        </h2>
                        <div class="entry-content">
                            @foreach ($data->paragraphs->sortBy('dis_order') as $item)
                            <div class="story_info">
								@if($item->title_display == 1)
								<h2>{{$item->title}}</h2>
								@endif
								<div class="row">
                                    <div class="col-lg-12">
										{!! $item->paragraph !!}
									</div>
                                </div>
                            </div>
                            @endforeach
                        </div>  
                    </article>
                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            <a href="#">{{ trans('common.statistic') }}</a>
                        </h2>
                        <div class="row">
                            <div class="col text-center">
                                <p><i class="fa-solid fa-user fa-2xl text-primary"></i></p>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $tatca }}" data-purecounter-duration="1" class="purecounter display-5"></span>
                                <p class="fw-bold">{{ trans('ngkhoa.person') }}</p>
                            </div>
                            <div class="col border-start border-end text-center">  
                                <p><i class="fa-solid fa-users fa-2xl text-warning"></i></p>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $doi }}" data-purecounter-duration="1" class="purecounter display-5"></span>
                                <p class="fw-bold">{{ trans('ngkhoa.generation') }}</p>
                            </div>
                            <div class="col text-center">  
                                <p><i class="fa-solid fa-code-branch fa-2xl text-danger"></i></p>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $nhanh }}" data-purecounter-duration="1" class="purecounter display-5"></span>
                                <p class="fw-bold"><strong>{{ trans('ngkhoa.branch') }}</strong></p>  
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="btn-group col-md-3" role="group">
                                <a href="{{ route('nguoi.view', ['id'=>1]) }}" class="btn btn-secondary"><i class="far fa-solid fa-circle-info"></i>&nbsp;{{ trans('common.detail')}}</a>
                            </div>
                        </div>
                        
                    </article>
                    <!-- End blog entry -->
                <!--
                    <div class="blog-author d-flex align-items-center">
                        <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                        <div>
                        <h4>Jane Smith</h4>
                            <div class="social-links">
                                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                            </div>
                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                            </p>
                        </div>
                    </div> 
                    End blog author bio
                -->

                </div>
  
                <div class="col-lg-3">
                    <div class="sidebar">
                        <x-frontend.sb-search />
                    </div>
                    @if(isset($recents)) 
                    <div class="sidebar">
                        <x-frontend.sb-recents :data="$recents" />
                    </div>
                    @endif
                    @if(isset($categories))
                    <div class="sidebar">
                        <x-frontend.sb-categories :data="$categories" />
                    </div>
                    @endif
                    <div class="sidebar">
                        <x-frontend.sb-tags :data="$tags" />
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
    
    <x-modals.home />

@endsection

@section('script')

<script>
    $(document).ready(function(){        
        var is_modal_show = sessionStorage.getItem('alreadyShow');
        if(is_modal_show != 'already shown'){
            $('#myModal').modal('show');
            sessionStorage.setItem('alreadyShow','already shown');
        }      
    });
</script>
@endsection