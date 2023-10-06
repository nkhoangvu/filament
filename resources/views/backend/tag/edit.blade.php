@extends('layouts.backend.default')

@section('pageTitle') {{ trans('ad_cms.link')}} @endsection
@section('branch_sb', 'active')
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
					<li class="breadcrumb-item"><a href="{{ route('tag.index')}}">@yield('pageTitle')</a></li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('tag.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
			@csrf

		<x-backend.tag :data="$data" :title="trans('common.edit')" />

		<x-buttons.button-submit route="tag.index" :label="trans('common.save')" />	

		</form>
	
	</div>
</section>
@endsection

@section('script')

	@includeif('admin.scripts.tag')

@endsection
