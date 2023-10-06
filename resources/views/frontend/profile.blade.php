
@extends('layouts.frontend.default')
@section('pageTitle') {{ trans('common.profile')}} @endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
	<div class="container-fluid">
		<div class="d-flex justify-content-between align-items-center">
			<h2 class="text-stroke all-cap">@yield('pageTitle')</h2>
			<ol>
			<li><a href="/">{{ trans('common.home') }}</a></li>
			<li>@yield('pageTitle')</li>
			</ol>
		</div>
	</div>
</section>
<!-- End Breadcrumbs -->


<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
    <div class="container-fluid" data-aos="fade-up">
		
		<!-- Content -->
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
				  		<h3 class="card-title">{{ trans('common.profiles')}}</h3>
						  <div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
    				<div class="card-body">
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-5" for="name">Name</label>
								<div class="col-md-10">
									<input type="text" id="name" value="{{$data->name}}" class="form-control" name="name" disabled/>
								</div>
							</div>
							<div class="form-group col">
								<label class="control-label col-md-5" for="group">{{ trans('common.group') }}</label>
								<div class="col-md-10">
									<input type="text" id="name" value="{{ $data->group }}" class="form-control" name="email" disabled/>
								</div>
							</div>
						</div>					
						<div class="row">						
							<div class="form-group col">
								<label class="control-label col-md-5" for="email">Email</label>
								<div class="input-group col-md-10">
									<div class="input-group-prepend">
										<span class="input-group-text">@</span>
									</div>
									<input type="text" id="email" value="{{$data->email}}" class="form-control" name="email" disabled/>
								</div>
							</div>
							<div class="form-group col">
								<label class="control-label col-md-5" for="coreid">Description</label>
								<div class="col-md-10">
									<input type="text" id="username" value="{{$data->description}}" class="form-control" name="username" disabled/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-5" for="coreid">Username</label>
								<div class="input-group col-md-10">
									<div class="input-group-prepend">
										<span class="input-group-text">#</span>
									</div>
									<input type="text" id="username" value="{{$data->username}}" class="form-control" name="username" disabled/>
								</div>
							</div>					
							<div class="form-group col">
								<label class="control-label col-md-5" for="email">Role</label>
								<div class="input-group col-md-10">
									<div class="input-group-prepend">
										<span class="input-group-text">!</span>
									</div>
									<input type="text" id="email" value="{{ Auth::user()->roles->pluck('display_name')->first() }}" class="form-control" name="email" disabled/>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<form class="form-horizontal" id="userForm" action="{{ route('profile.password', [$data->id]) }}" method="POST" enctype="multipart/form-data">
				@csrf
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
								<label class="control-label col-md-5" for="name">{{ trans('common.password')}}</label>
								<div class="col-md-10">
									<input type="password" id="password" value="" class="form-control" name="password" autocomplete="off"/>
								</div>
							</div>
							<div class="form-group col">
								<label class="control-label col-md-5">{{ trans('common.confirm_password')}}</label>
								<div class="col-md-10">
									<input type="password" id="confirm" class="form-control" name="confirm" autocomplete="off"/>
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
						<a class="btn btn-default" href="{{ route('home') }}">Cancel</a>
					</div>
				</div>
				</form>
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
			},
    	},
    messages: {
		password: {
        	minlength: "{{ trans('common.minlength') }}",
    		},
		confirm: {
			equalTo: "{{ trans('common.confirm') }}",
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