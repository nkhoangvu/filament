@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.nguoi') }} @endsection
@section('nguoi_sb', 'active')

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
					<li class="breadcrumb-item active">@yield('pageTitle')</li>
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
		<x-nguoi.list :data="$data" />
		
		<x-buttons.footer-reset  />
	</div>
</section>			
@endsection

@section('script')

	@include('scripts.backend.datatables')
	@include('scripts.backend.index-6-col')

@endsection
