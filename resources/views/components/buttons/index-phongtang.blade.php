@props(['id'])

<a class="btn btn-sm btn-info" href="{{ route('phongtang.assign', ['id'=>$id]) }}" title="{{ trans('ngkhoa.phongtang') }}"><i class="fa-solid fa-medal"></i></a>&nbsp;