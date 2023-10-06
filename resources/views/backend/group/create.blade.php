
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.group')}} @endsection
@section('user_main_sb', 'menu-open')
@section('group_sb', 'active')

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
					<li class="breadcrumb-item"><a href="{{ route('group.index') }}">@yield('pageTitle')</a></li>
					<li class="breadcrumb-item active">{{ trans('common.create')}}</li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('group.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
		
		<x-group />
		
		<x-buttons.footer-submit route="group.index" :label="trans('common.update')"/>
		</form>
	</div>
</section>
@endsection

@section('script')
	
	@include('scripts.backend.group')
	
@endsection