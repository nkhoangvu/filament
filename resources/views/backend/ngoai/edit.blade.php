@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.ngoai') }} @endsection
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
                    <li class="breadcrumb-item"><a href="{{route('ngoai.index')}}">@yield('pageTitle')</a></li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('ngoai.update', [$data->MaNgoai]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
		
			<x-ngoai :data="$data" :Me="$Me"/>

			<x-buttons.footer-submit route="ngoai.index" :label="trans('common.update')"/>
			
		</form>
	</div>
</section>
@endsection

@section('script')

	@include('scripts.backend.ngoai')
	<script type="text/javascript">
		$(function () {
	
			$('#gioitinh').val({{$data->GioiTinh}}).change();
			
		});
		
	</script>
@endsection