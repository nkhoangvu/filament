@props(['route', 'parameter'])

<div class="row">
	<div class="col-12">
		<div class="card-footer">
			<div class="row" >
				<div class="btn-group col-md-2" role="group">
					<a href="javascript:;" id="reset-table" class="btn btn-default"><i class="fa-solid fa-window-restore"></i> {{ trans('common.reset') }}</a>
				</div>
				@role('super-admin|admin')
				<div class="btn-group col-md-2" role="group">
					@if(isset($parameter))
					<a href="{{ route($route, $parameter) }}" class="btn btn-primary"><i class="fa-solid fa-square-plus nav-icon"></i>{{ trans('common.create')}}</a>
					@else
					<a href="{{ route($route) }}" class="btn btn-primary"><i class="fa-solid fa-square-plus nav-icon"></i>{{ trans('common.create')}}</a>
					@endif
				</div>
				@endrole
			</div>
		</div>	
	</div>
</div>
<br />