@props(['route', 'parameter', 'label'])

<div class="row">
	<div class="col-12">
		<div class="card-footer">
			<div class="row">
				<div class="btn-group col-md-2" role="group">
					<button class="btn btn-primary" type="submit"><i class="nav-icon fa-solid fa-floppy-disk"></i>&nbsp;{{ $label }}</button>
				</div>
				<div class="btn-group col-md-2" role="group">
					@if(isset($parameter))
					<a class="btn btn-default" href="{{ route($route, $parameter) }}"><i class="nav-icon fa-solid fa-ban"></i>{{ trans('common.cancel')}} </a>
					@else
					<a class="btn btn-default" href="{{ route($route) }}"><i class="nav-icon fa-solid fa-ban"></i>{{ trans('common.cancel')}} </a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
<br />