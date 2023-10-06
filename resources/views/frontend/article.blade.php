@extends('layouts.frontend.default')

@section($current, 'active')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-stroke all-cap">{{$data->category->name}}</h2>
                <ol>
                <li><a href="/">{{ trans('common.home') }}</a></li>
                <li><a href="/bai-viet/{{$data->category->route}}">{{$data->category->name}}</a></li>
                <li>{{ $data->title }}</li>
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
                <!--
                    <div class="entry-img">
                        <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                    </div>
                -->
                    <h2 class="entry-title">
                        <a href="blog-single.html">{{ $data->title }}</a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="fa-regular fa-circle-user nav-icon"></i><a href="blog-single.html">{{ $data->author->name }}</a></li>
                            <li class="d-flex align-items-center"><i class="fa-regular fa-clock nav-icon"></i><a href="blog-single.html"><time datetime="{{ formatDate($data->created_at) }}">{{ formatDate($data->created_at) }}</time></a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        {!! $data->content !!}
                    </div>
                    <x-frontend.gallery :data="$data" name="article" />
                    <div class="entry-footer">
                        <i class="fa-solid fa-folder"></i>
                        <ul class="cats">
                            <li><a href="/bai-viet/{{$data->category->route}}">{{ $data->category->name }}</a></li>
                        </ul>
                        <i class="fa-solid fa-tags"></i>
                        <ul class="tags">
                            @foreach ($data->tags as $tag)
                            <li><a href="{{route('baiviet.tag', [$tag->slug])}}">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </article>

                <x-frontend.article-navi :next="$next" :previous="$previous"/>

            </div>
            <!-- End blog entries list -->

            <div class="col-lg-3">
                
                <x-frontend.sidebar :tags="$tags" :recents="$recents" :categories="$categories" />
                
            </div>
        </div>
    </section>
    <!-- End Blog Single Section -->

@endsection

@section('script')
<script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<link rel="stylesheet" href="/assets/plugins/jquery-fancybox/jquery.fancybox.min.css">
<script src="/assets/plugins/jquery-fancybox/jquery.fancybox.min.js"></script>
<script src="/assets/js/masonry.js"></script>
<link rel="stylesheet" href="/assets/css/masonry.css" />
<script type="text/javascript">
            
    $('.image-box').fancybox();
    
</script>

@endsection