<!-- End blog entry -->
<div class="d-flex justify-content-evenly mb-3">
    @if(isset($previous))
    <div class="btn-group col-md-2" role="group">
        <a class="btn btn-danger" href="{{ route('baiviet', [$previous->slug])}}" rel="prev"><i class="fa-solid fa-circle-left nav-icon"></i>{{trans('common.previous')}}</a>                  
    </div>
    @endif
    <div class="btn-group col-md-2" role="group">
        <a class="btn btn-danger" href="{{ route('baiviet', [$data->category->route])}}">{{$data->category->name}}</a>
    </div>
    @if(isset($next))
    <div class="btn-group col-md-2" role="group">
        <a class="btn btn-danger" href="{{ route('baiviet', [$next->slug])}}" rel="next">{{trans('common.next')}}<i class="fa-solid fa-circle-right nav-icon"></i></a>
    </div>
    @endif                   
</div>