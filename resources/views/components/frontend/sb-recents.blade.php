@props(['data'])                

<!-- Sidebar recent posts-->
<h3 class="sidebar-title">{{ trans('common.recent_post') }}</h3>
<div class="sidebar-item recent-posts">
    @foreach ($data as $item)
    <div class="post-item clearfix">
        <img src="/assets/img/article.jpg" alt="">
        <h4><a href="/bai-viet/{{$item->slug}}">{{$item->title}}</a></h4>
        <time datetime="2020-01-01">{{ formatDate($item->created_at)}}</time>
    </div>
    @endforeach
</div>
<!-- End sidebar recent posts-->
