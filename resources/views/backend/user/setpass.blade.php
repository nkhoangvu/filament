
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.user')}} @endsection
@section('user_main_sb', 'menu-open')
@section('user_sb', 'active')

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
					<li class="breadcrumb-item"><a href="/">{{ trans('common.home') }}</a></li>
					<li class="breadcrumb-item">@yield('pageTitle')</li>
					<li class="breadcrumb-item active">{{ trans('common.setpass')}}</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		
		<!-- Notification -->
		<x-message />

		<!-- Content -->
		<div class="row">
			<div class="col-12">
				<form class="form-horizontal" id="userForm" action="{{ route('user.setpass', [$data->id]) }}" method="POST" enctype="multipart/form-data">
				@method('PUT')
				@csrf
				<div class="card card-primary">
					<div class="card-header">
				  		<h3 class="card-title">{{ trans('common.user_edit')}}</h3>
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
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-3" for="name">{{ trans('common.name') }}</label>
								<div class="col-md-10">
									<input type="text" id="name" value="{{$data->name}}" class="form-control" name="name" readonly/>
								</div>
							</div>
							<div class="form-group col">
								<label class="control-label col-md-5" for="department">{{trans('common.group')}}</label>
								<div class="col-md-10">
									<input type="text" id="name" value="{{$data->nhom->name}}" class="form-control" name="name" readonly/>
								</div>
							</div>
						</div>					
						<div class="row">						
							<div class="form-group col">
								<label class="control-label col-md-3" for="email">Email</label>
								<div class="col-md-10">
									<input type="text" id="email" value="{{$data->email}}" class="form-control" name="email"/>
								</div>
							</div>
							<div class="form-group col">
								<label class="control-label col-md-3" for="coreid">Username</label>
								<div class="col-md-10">
									<input type="text" id="username" value="{{$data->username}}" class="form-control" name="username"/>
								</div>
							</div>					
						</div>	
					</div>
				</div>
				<div class="card card-primary">
					<div class="card-header">
			  			<h3 class="card-title">{{ trans('common.password')}}</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
    				<div class="card-body">
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-3" for="name">{{ trans('common.password')}}</label>
								<div class="col-md-10">
									<input type="password" id="password" value="" class="form-control" name="password"/>
								</div>
							</div>
							<div class="form-group col">
								<label class="control-label col-md-3">{{ trans('common.confirm_password')}}</label>
								<div class="col-md-10">
									<input type="password" id="confirm" class="form-control" name="confirm"/>
								</div>
							</div>
						</div>				
					</div>
				</div>
				<div class="card-footer" >
					<div class="row" >
						<div class="btn-group col-md-2" role="group">
							<button class="btn btn-primary" type="submit">Save</button>
						</div>
						<div class="btn-group col-md-2" role="group">
							<a class="btn btn-default" href="{{ route('user.index') }}">Cancel</a>
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
<script type="text/javascript">
$(function () {
	$("#userForm").validate({
  		rules: {
			password : {
				minlength : 6
			},
			confirm : {
					equalTo : "#password",
					minlength : 6
			},
    	},
    messages: {
    	password: {
        	required: "{{ trans('common.input_required') }}",
    		},
		},
	errorElement: 'span',
	errorPlacement: function (error, element) {
    	error.addClass('invalid-feedback');
      	element.closest('.form-group').append(error);
    	},
    highlight: function (element, errorClass, validClass) {
    	$(element).addClass('is-invalid');
    	},
    unhighlight: function (element, errorClass, validClass) {
    	$(element).removeClass('is-invalid');
    	}
  	});
	
});

</script>
@endsection