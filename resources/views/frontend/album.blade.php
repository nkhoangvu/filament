@extends('layouts.frontend.default')

@section($current, 'active')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-stroke all-cap">{{ trans('common.gallery') }}</h2>
                <ol>
                    <li><a href="/">{{ trans('common.home') }}</a></li>
                    <li>{{ trans('common.gallery') }}</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="blog" class="blog">
    
        <div class="container-fluid" data-aos="fade-up">
            <div class="row col-md-12">
                <div class="col-lg-9">
                    <section id="portfolio" class="portfolio">
                    <div class="row portfolio-container">
                        @foreach($albums as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap">
                                <img src="/uploads/albums/{{ $item->picture }}" class="img-fluid" alt="{{$item->name}}">
                                <div class="portfolio-info">
                                    <h4>{{ $item->name }}</h4>              
                                    <div class="portfolio-links">
                                        <a href="/hinh-anh/{{ $item->id }}" title="Portfolio Details">
                                            <p>{{$item->notes}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </section>
                    <div class="row">
                        <div class="av-masonry-pagination">
                            {{ $albums->links() }}	
                        </div>		
                    </div>
                </div>
                <div class="col-lg-3">
                    <x-frontend.sidebar :tags="$tags" :recents="$recents" :categories="$categories" />
                </div>
            </div>
        </div>
    </section>
        
    <!-- End Portfolio Section -->


@endsection

@section('script')

    @includeif('scripts.frontend.toast')	
    
@endsection