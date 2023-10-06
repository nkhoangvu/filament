@props(['route', 'id'])

<a class="btn btn-sm btn-danger" onclick="return confirm('{{ trans('common.confirm_delete') }}');" href="{{ route($route, ['id'=>$id]) }}" title="{{ trans('common.delete') }}"><i class="fa-solid fa-trash-can"></i></a>&nbsp;