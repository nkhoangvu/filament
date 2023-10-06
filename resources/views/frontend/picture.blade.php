@extends('layouts.frontend.default')

@section($current, 'active')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-stroke all-cap">{{trans('common.picture')}}</h2>
                <ol>
                <li><a href="/">{{ trans('common.home') }}</a></li>
                <li><a href="/hinh-anh">{{ trans('common.gallery') }}</a></li>
                <li>{{trans('common.picture')}}</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <h2>{{$album->name}}</h2>
            </div>
        </div>

        <div class="row portfolio-container">
            @foreach ($images as $item)               
            <div class="col-lg-4 col-md-6 portfolio-item">
                <div class="portfolio-wrap">
                    <img src="/uploads/albums/{{$album->folder}}/{{$item->getFilename()}}" class="img-fluid" alt="{{$album->name}}">
                    <div class="portfolio-info">
                        <h4>Hình {{ $loop->index + 1 }}</h4>              
                        <div class="portfolio-links">
                            <a href="/uploads/albums/{{$album->folder}}/{{$item->getFilename()}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$album->notes}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                            <!--<a href="#" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
  </section><!-- End Portfolio Section -->


@endsection

@section('script')

    
@endsection