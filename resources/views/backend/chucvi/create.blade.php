@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.chucvi') }} @endsection
@section('package_sb', 'active')

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
                    <li class="breadcrumb-item"><a href="{{ route('chucvi.index') }}">{{ trans('ngkhoa.chucvi')}}</a></li>
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
		<form class="form-horizontal" id="paymentForm" action="{{ route('chucvi.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			
            <x-backend.chucvi />
            
			<x-buttons.footer-submit :route="'chucvi.index'" :label="trans('common.save')"/>
			
		</form>
	</div>
</section>
@endsection

@section('script')
	
@endsection