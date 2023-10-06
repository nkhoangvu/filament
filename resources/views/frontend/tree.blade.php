@extends('layouts.frontend.giapha')

@section('cur_giapha', 'active')
	
@section('content')

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container-fluid">
			<div class="d-flex justify-content-between align-items-center">
				<h2 class="text-stroke all-cap">{{ trans('ngkhoa.giapha') }}</h2>
				<ol>
					<li><a href="/">{{ trans('common.home') }}</a></li>
					<li>{{ trans('ngkhoa.giapha') }}</li>
				</ol>
			</div>
		</div>
	</section>
	<!-- End Breadcrumbs -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid" data-aos="fade-up">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<form id="searchForm" class="form-horizontal" action="{{ route('search.nguoi') }}" method="GET" enctype="multipart/form-data">
						@csrf
						<div class="input-group">
							<input class="form-control form-control-sidebar" type="search" placeholder="{{ trans('common.search') }}" aria-label="Search" name="search">
							<div class="input-group-append">
								<button type="submit" class="btn btn-default" aria-label="Search">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div><br />
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

				<div class="col-md-3">
					<x-giapha.block-ten :data="$data" />

					<x-giapha.block-canhan :data="$data" />
					
				</div>

				<div class="col-md-6">  
					<x-giapha.block-chitiet :data="$data" :PhoiNgau="$PhoiNgau" />

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
@endsection