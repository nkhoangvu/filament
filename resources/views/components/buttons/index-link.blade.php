@props(['id'])

<a class="btn btn-sm btn-dark" href="{{ route('lienket.assign', ['id'=>$id]) }}" title="{{ trans('ngkhoa.lienket') }}"><i class="fa-solid fa-link"></i></a>&nbsp;