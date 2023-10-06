@props(['data'])

@foreach ($data as $item)
<!-- Blog entry -->
<article class="entry">
    <!--
    <div class="entry-img">
        @if (isset($item->picture))
        <img class="card-img rounded-0" src="/uploads/{{$item->picture}}" alt="">
        @else
        <img class="card-img rounded-0" src="/uploads/post_no_pic.png" alt="">
        @endif
    </div>
    -->
    <h4><a href="/bai-viet/{{$item->slug}}">{{$item->title}}</a></h4>

    <div class="entry-meta">
        <ul>
            <li class="d-flex align-items-center"><i class="fa-regular fa-circle-user nav-icon"></i><a href="#">{{$item->author->name}}</a></li>
            <li class="d-flex align-items-center"><i class="fa-regular fa-clock"></i><time datetime="{{ formatDate($item->created_at) }}">{{ formatDate($item->created_at) }}</time></li>
        </ul>
    </div>

    <div class="entry-content">
        <p>{{ strip_tags(Str::limit($item->content, 250)) }}</p>
        <div class="read-more mb-3">
            <a href="/bai-viet/{{$item->slug}}">{{ trans('common.readmore') }}</a>
        </div>
    </div>

    <div class="entry-footer">
        <i class="fa-solid fa-folder"></i>
            <ul class="cats">
                <li><a href="/bai-viet/{{$item->category->route}}">{{$item->category->name}}</a></li>
            </ul>
            <i class="fa-solid fa-tags"></i>
            <ul class="tags">
                @foreach ($item->tags as $tag)
                <li><a href="{{ route('baiviet.tag', [$tag->slug]) }}">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>
</article>
@endforeach
<!-- End blog entry -->