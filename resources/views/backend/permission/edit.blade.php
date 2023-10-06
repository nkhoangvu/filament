
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.permission') }} @endsection
@section('user_main_sb', 'menu-open')
@section('permission_sb', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>@yield('pageTitle')</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('common.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permission.index') }}">@yield('pageTitle')</a></li>
					<li class="breadcrumb-item active">{{ trans('common.edit')}}</a></li>
				</ol>
			</div>
		</div>
	</div>
</section>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
	<!-- Notification -->
	@includeif('backend.partials.message') 
	<!-- Content -->
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">{{ trans('common.permission_edit') }}</h3>
					  	<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<!-- Content begin -->
					<div class="card-body">
						<form class="form-horizontal" id="methodForm" action="{{ route('permission.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
    					@csrf
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-3" for="name">{{ trans('common.code')}}</label>
								<div class="col-md-12">
									<input type="text" id="name" disabled value="{{ $data->name }}" class="form-control" name="name"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-3" for="displayname">{{ trans('common.displayname')}}</span></label>
								<div class="col-md-12">
									<input type="text" value="{{ $data->display_name }}" class="form-control" name="display_name"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-3" for="description">{{ trans('common.description')}}</label>
								<div class="col-md-12">
									<input type="text" id="description" value="{{ $data->description }}" class="form-control" name="description"/>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="btn-group col-md-2" role="group">
							<button class="btn btn-primary" type="submit">{{ trans('common.save')}}</button>
						</div>&nbsp;
						<div class="btn-group col-md-2" role="group">
							<a class="btn btn-default" href="{{ route('permission.index') }}">{{ trans('common.cancel') }}</a>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>

</section>
@endsection

@section('script')

	@include('scripts.backend.permission')
	
@endsection
