@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.phongtang') }} @endsection
@section('chucvi_sb', 'active')

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
                    <li class="breadcrumb-item"><a href="{{ route('phongtang.index') }}">@yield('pageTitle')</a></li>
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
		<form class="form-horizontal" id="paymentForm" action="{{ route('chucvi.update', [$data->MaChucVi]) }}" method="POST" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		
		<x-chucvi :data="$data" />
                    
		<x-buttons.footer-submit :route="'phongtang.index'" :label="trans('common.update')"/>
		
		</form>
	</div>

</section>

@endsection

@section('script')

	@includeif('partials.scripts.phongtang') 

@endsection