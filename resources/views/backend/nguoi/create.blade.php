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
					<li class="breadcrumb-item active"><a href="{{ route('nguoi.index')}}">@yield('pageTitle')</a></li>
                    <li class="breadcrumb-item">{{ trans('common.create')}}</a></li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('nguoi.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		
		<x-nguoi.nguoi :Cha="$Cha" :MoTang="$MoTang" :MaDoi="$MaDoi" />
		
		<x-buttons.footer-submit route="nguoi.index" :label="trans('common.save')"/>
		
		</form>
	</div>
</section>
@endsection

@section('script')

	@includeif('backend.scripts.nguoi') 
	<script type="text/javascript">
		$(document).ready(function() {
	
		  $('#MaNhanh').val({{$Cha->MaNhanh}}).change();
		
		});
	</script>
	
@endsection