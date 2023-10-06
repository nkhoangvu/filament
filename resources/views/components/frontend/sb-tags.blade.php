@props(['data'])

<h3 class="sidebar-title">{{trans('common.tag')}}</h3>
<div class="sidebar-item tags">
    <ul>
        @foreach ($data as $tag)
        <li><a href="{{route('baiviet.tag', [$tag->slug])}}" rel="tag">{{$tag->name}}</a></li>
        @endforeach
    </ul>
</div>
<!-- End sidebar tags-->