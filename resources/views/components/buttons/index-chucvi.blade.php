@props(['id'])

<a class="btn btn-sm btn-secondary" href="{{ route('chucvi.assign', ['id'=>$id]) }}" title="{{ trans('ngkhoa.chucvi') }}"><i class="fa-solid fa-award"></i></a>&nbsp;