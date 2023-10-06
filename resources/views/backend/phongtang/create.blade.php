@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.phongtang_moi') }} @endsection
@section('package_sb', 'active')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('ngkhoa.phongtang')}}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">{{ trans('common.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('phongtang.index') }}">{{ trans('ngkhoa.phongtang')}}</a></li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('phongtang.store') }}" method="POST" enctype="multipart/form-data">
		@csrf

		<x-phongtang />
                    
		<x-buttons.footer-submit :route="'phongtang.index'" :label="trans('common.save')"/>

		</form>
	</div>
</section>

@endsection

@section('script')

	@includeif('partials.scripts.phongtang') 

@endsection