@extends('layouts.frontend.giapha')

@section('pageTitle', $pageTitle)
@section('pageDescription', $pageDescription)
@section('pageAuthor', $pageAuthor)
@section('cur_giapha', 'active')
	
@section('content')
<!-- Content Header (Page header) -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
	<div class="container-fluid">

	  <div class="d-flex justify-content-between align-items-center">
		<h2 class="text-stroke all-cap">@yield('pageTitle')</h2>
		<ol>
		  <li><a href="/">{{ trans('common.home') }}</a></li>
		  <li>@yield('pageTitle')</li>
		</ol>
	  </div>

	</div>
  </section>
  <!-- End Breadcrumbs -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid" data-aos="fade-up">
		<div class="row">		
			<div class="col-md-3">		
				<div class="card-body">
					<div class="card card-warning card-outline">
						<div class="card-header">
							<h3 class="card-title">{{ trans('ngkhoa.cay') }}</h3>
						</div>
						<div class="card-body">
						{!! $tree !!}
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-9">
			<!-- Notification -->
			<x-message />
		

			<!-- Content -->
			<form class="form-horizontal" id="mainForm" action="{{ route('family.daureUpdate', [$data->MaDauRe]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
				
			<x-daure :data="$data" :MoTang="$MoTang"/>
			
			<x-buttons.footer-submit route="family.nguoiShow" :parameter="[$data->nguoi->MaNguoi]" :label="trans('common.update')"/>

			</form>

		</div>

	</div>
		
</section>
    
@endsection

@section('script')

	<script type="text/javascript">
		$(document).ready(function(){
			$("#browser").treeview({
				collapsed: true,
				control:"#sidetreecontrol",
				collapsed: true,
				unique: true,
				persist: "location"
			});
		});
	</script>
	
	@includeif('frontend.scripts.common')
	
@endsection