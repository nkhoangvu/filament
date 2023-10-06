@props(['route', 'id'])

<a class="btn btn-sm btn-success" href="{{ route($route, ['id'=>$id]) }}" title="{{ trans('ngkhoa.nguoi_moi') }}"><i class="fa-solid fa-person-circle-plus"></i></a>&nbsp;