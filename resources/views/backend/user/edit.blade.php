
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
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('common.dashboard') }}</a></li>
					<li class="breadcrumb-item"><a href="{{ route('user.index')}}">@yield('pageTitle')</a></li>
					<li class="breadcrumb-item active">{{ trans('common.edit') }}</li>
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
		<form class="form-horizontal" id="userForm" action="{{ route('user.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
		
		<x-user :data="$data" :group="$group" :role="$role" :roleid="$roleid" />
		
		<x-buttons.footer-submit route="user.index" :label="trans('common.update')"/>
		
		</form>
	</div>
</section>
@endsection

@section('script')

	@include('scripts.backend.user')

@endsection