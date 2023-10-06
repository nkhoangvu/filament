<div class="row">
	<div class="col-12">
		<div class="card-footer">
			<div class="row" >
				<div class="btn-group col-md-2" role="group">
					<a href="javascript:;" id="reset-table" class="btn btn-default"><i class="nav-icon fa-solid fa-window-restore"></i>{{ trans('common.reset') }}</a>
				</div>
				@role('super-admin|admin')
				<div class="btn-group col-md-2" role="group">
					<a href="{{ route($route) }}" class="btn btn-primary"><i class="nav-icon fa-solid fa-square-plus"></i>{{ trans('common.create')}}</a>
				</div>
				@endrole
			</div>
		</div>
	</div>
</div>