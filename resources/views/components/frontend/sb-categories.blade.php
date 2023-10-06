@props(['data'])

<!-- Sidebar categories-->                        
<h3 class="sidebar-title">{{ trans('common.category') }}</h3>
<div class="sidebar-item categories">
    <ul>
        @foreach($data as $item)
        <li><a href="/bai-viet/{{ $item->route }}">{{ $item->name }}<span>({{ $item->baiviet_count }})</span></a></li>
        @endforeach
    </ul>
</div>
<!-- End sidebar categories-->