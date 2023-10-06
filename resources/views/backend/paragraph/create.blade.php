
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ad_cms.paragraph')}} @endsection
@section('page_sb', 'active')

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
					<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('common.home') }}</a></li>
					<li class="breadcrumb-item"><a href="/admin/page">{{ trans('ad_cms.page')}}</a></li>
					<li class="breadcrumb-item active">{{ trans('ad_cms.paragraph')}}</li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('paragraph.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
		
		<x-backend.paragraph :page="$page" :title="trans('common.create')"/>

		<x-buttons.button-submit route="page.show" :parameter="[$page->id]" :label="trans('common.update')" />
			
		</form>
	</div>
</section>
@endsection

@section('script')
	
	@include('scripts.backend.paragraph')

@endsection