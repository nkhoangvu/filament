@props(['route', 'id'])

<a class="btn btn-sm btn-primary" href="{{ route($route, ['id'=>$id]) }}" title="{{ trans('common.editBtn')}}">
	<i class="fa-solid fa-pen-to-square"></i>
</a>