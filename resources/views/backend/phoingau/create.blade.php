@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.phoingau') }} @endsection
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
					<li class="breadcrumb-item"><a href="/">{{ trans('common.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/nguoi">{{ trans('ngkhoa.nguoi')}}</a></li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('phoingau.store', [$data->MaNguoi]) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<x-phoingau :data="$data" :DauRe="$DauRe" />
		
		<div class="row">
			<div class="col-12">
				<div class="card-footer">
					<div class="row" >
						<div class="btn-group col-md-2" role="group">
							<a class="btn btn-default" href="{{ route('nguoi.index') }}"><i class="fa-solid fa-ban"></i>&nbsp;{{ trans('common.back')}} </a>
						</div>
							<div class="btn-group col-md-2" role="group">
							<a class="btn btn-default" href="{{ route('daure.create') }}"><i class="fa-solid fa-ban"></i>&nbsp;{{ trans('common.create')}} </a>
						</div>
						<div class="btn-group col-md-2" role="group">
							<a href="javascript:;" id="reset-table" class="btn btn-default"><i class="fa-solid fa-window-restore"></i>&nbsp;{{ trans('common.reset') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</section>
@endsection

@section('script')

	@include('scripts.backend.phoingau')
	
@endsection