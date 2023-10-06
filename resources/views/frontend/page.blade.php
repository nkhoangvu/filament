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
                <li>@yield('pageTitle')</li>
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
                            <a href="#">{{ $page->title }}</a>
                        </h2>
  
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="{{ formatDate('$data->date') }}">{{ formatDate('$data->date') }}</time></a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            @foreach ($page->paragraphs as $item)
                            <div class="story_info">
								@if($item->title_display == 1)
								<h2>{{$item->title}} </h2>
								@endif
								<div class="row">
                                    <div class="col-lg-12">
										{!! $item->paragraph !!}
									</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
  
                        <div class="entry-footer">
                        <!--
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>
                         
                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        -->
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
                    </div> End blog author bio -->
                </div><!-- End blog entries list -->
  
                <div class="col-lg-3">
                    <div class="sidebar">
                        
                    </div>
                    <!-- End sidebar -->
                </div><!-- End blog sidebar -->
            </div>
        </div>
        <x-modals.home />
        
    </section><!-- End Blog Single Section -->


@endsection

@section('script')
<script>
    $(document).ready(function(){
        
        var is_modal_show = sessionStorage.getItem('alreadyShow');
        if(is_modal_show != 'alredy shown'){
            $('#myModal').modal('show');
            sessionStorage.setItem('alreadyShow','alredy shown');
        }
        
    });
</script>
    
@endsection