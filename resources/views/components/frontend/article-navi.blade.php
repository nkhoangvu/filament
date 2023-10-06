@props(['next', 'previous'])

<article class="entry entry-single mb-5">
    <div class="container overflow-hidden">
        <div class="row justify-content-between">
            @if(isset($next))
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <a href="{{ route('baiviet', [$next->slug])}}">
                    <h5 class="link-secondary1 fw-bold mb-3"><i class="fa-solid fa-circle-left nav-icon"></i>{{trans('common.next')}}</h5>
                    <h6 class="link-dark border-start border-10 p-3">{{$next->title}}</h6>
                </a>
            </div>
            @endif
            @if(isset($previous))
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <a href="{{ route('baiviet', [$previous->slug])}}" class="text-decoration-none">
                    <h5 class="link-secondary1 fw-bold mb-3">{{trans('common.previous')}}<i class="fa-solid fa-circle-right nav-icon-inv"></i></h5>
                    <h6 class="link-dark border-start border-10 p-3">{{$previous->title}}</h6>
                </a>
            </div>
            @endif
        </div>
    </div>
</article>