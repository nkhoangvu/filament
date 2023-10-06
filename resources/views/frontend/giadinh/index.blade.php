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
				<div class="card-body">
					<div class="card card-warning card-outline">
						<div class="card-header">
							<h3 class="card-title">{{ trans('ngkhoa.menu') }}</h3>
						</div>
						<div class="card-body">
						<x-frontend.sidebar />
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<!-- Profile & About-->
				<x-giapha.block-ten :data="$data" />
				<x-giapha.block-canhan :data="$data" />
			</div>

			<div class="col-md-6"> 
				<div class="row">
					<x-giapha.block-chitiet :data="$data" :PhoiNgau="$PhoiNgau" />
				</div>
			</div>
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
	@includeif('frontend.scripts.nguoi')
	@includeif('frontend.scripts.common')
	@includeif('frontend.scripts.protect1')
	
@endsection
