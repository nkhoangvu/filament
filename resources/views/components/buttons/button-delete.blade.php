@props(['route', 'id'])

<a class="btn btn-sm btn-danger" onclick="return confirm('{{trans('common.deleteConfirm')}}');" href="{{ route($route, ['id'=>$id]) }}" title="{{ trans('common.deleteBtn')}}">
	<i class="fa-solid fa-trash-can"></i>
</a>