@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.daure_chinhsua') }} @endsection
@section('daure_sb', 'active')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('ngkhoa.daure') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('common.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('daure.index') }}">@yield('pageTitle')</a></li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('daure.update', [$data->MaDauRe]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
		
		<x-daure.daure :data="$data" :MoTang="$MoTang"/>

		<x-buttons.footer-submit :route="'daure.index'" :label="trans('common.update')" />

		</form>
	</div>
</section>
@endsection

@section('script')

	@include('scripts.backend.daure')
	
@endsection