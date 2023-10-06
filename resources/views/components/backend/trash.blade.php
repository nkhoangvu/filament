@props(['data', 'model', 'title'])

<div class="row mb-5">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                  <h3 class="card-title">{{ $title }}</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="{{$model}}" class="table wrap-list-est table-bordered table-fixed-header" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th width="70%">{{ trans('common.title')}}</th>
                        <th width="20%">{{ trans('common.deleted_at')}}</th>
                        <th width="10%" class="text-center">{{ trans('common.action')}}</th>
                        </tr>
                    </thead>
                <tbody>
                        @foreach ($data as $item)
                        <tr>
                        <td width="70%">{{$item->title}}</td>
                        <td width="20%" class="text-center">{{formatDateTime($item->deleted_at)}}</td>
                        <td width="10%" class="text-center">
                            <a class="btn btn-sm btn-primary" href="{{ route('trash.restore', ['model'=>$model, 'id'=>$item->id]) }}" title="{{ trans('common.restoreBtn')}}">
                                <i class="fa-solid fa-trash-arrow-up"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('{{trans('common.deleteConfirm')}}');" href="{{ route('trash.delete', ['model'=>$model, 'id'=>$item->id]) }}" title="{{ trans('common.restoreBtn')}}">
                                <i class="fa-solid fa-trash-arrow-up"></i>
                            </a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <th width="70%">{{ trans('common.title')}}</th>
                        <th width="20%">{{ trans('common.deleted_at')}}</th>
                        <th width="10%" class="text-center">{{ trans('common.action')}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

		<div class="card-footer">
			<div class="row" >
				@role('super-admin|admin')
				<div class="btn-group col-md-2" role="group">
					<a href="{{ route('trash.empty', ['model'=>$model])}}" onclick="return confirm('{{trans('common.deleteConfirm')}}');" class="btn btn-danger"><i class="nav-icon fa-solid fa-square-plus"></i>{{ trans('common.trash_empty')}}</a>
				</div>
				@endrole
			</div>
		</div>
	</div>
</div>