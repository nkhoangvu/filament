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
				<!-- Profile & About-->
				<x-giapha.block-ten :data="$data" />
				<x-giapha.block-canhan :data="$data" />
			</div>

			<div class="col-md-9">  
			    <!-- Cac tab thong tin chi tiet  -->
				<div class="card card-warning card-outline card-outline-tabs">
					<div class="card-header p-0 pt-1">
					  <ul class="nav nav-tabs z-3 position-absolute" id="custom-tabs-one-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#chanhthat" data-bs-toggle="tab" role="tab" aria-controls="chanhthat">
									<strong>{{ trans('ngkhoa.chanhthat') }}</strong>
								</a>
							</li>
							@if (isset($KeThat))
							<li class="nav-item">
								<a class="nav-link" href="#kethat" data-bs-toggle="tab" role="tab" aria-controls="kethat">
									<strong>{{ trans('ngkhoa.kethat') }}</strong></a>
							</li>
							@endif                
							@if (isset($ThuThat))
							<li class="nav-item">
								<a class="nav-link" href="#thuthat" data-bs-toggle="tab" role="tab" aria-controls="thuthat">
									<strong>{{ trans('ngkhoa.thuthat') }}</strong>
								</a>
							</li>
							@endif
							@if (isset($TracThat))
							<li class="nav-item">
								<a class="nav-link" href="#tracthat" data-bs-toggle="tab" role="tab" aria-controls="tracthat">
									<strong>{{ trans('ngkhoa.tracthat') }}</strong>
								</a>
							</li>
							@endif
							@if (isset($YThat))
							<li class="nav-item">
								<a class="nav-link" href="#ythat" data-bs-toggle="tab" role="tab" aria-controls="ythat">
									<strong>{{ trans('ngkhoa.ythat') }}</strong>
								</a>
							</li>
							@endif
							@if(!$data->chucvi->isEmpty() || !$data->phongtang->isEmpty() )
							<li class="nav-item">
								<a class="nav-link" href="#sunghiep" data-bs-toggle="tab" role="tab" aria-controls="sunghiep">
									<strong>{{ trans('ngkhoa.sunghiep') }}</strong>
								</a>
							</li>
							@endif
							@if(!$data->lienket->isEmpty() || isset($data->GhiChu))
							<li class="nav-item">
								<a class="nav-link" href="#khac" data-bs-toggle="tab" role="tab"  aria-controls="khac">
									<strong>{{ trans('ngkhoa.khac') }}</strong>
								</a>
							</li>
							@endif
						</ul>
					</div>
					
					<div class="card-body">
						<div class="tab-content">
							<!-- Thong tin Chanh That -->
							<div class="tab-pane fade show active" id="chanhthat" role="tabpanel" aria-labelledby="chanhthat">
								@if(!$ChanhThat->isEmpty())
								@foreach ($ChanhThat as $item)
								<div class="post">
									<x-giapha.phoingau :data="$item" :phoingau="trans('ngkhoa.chanhthat')" />
									<x-giapha.sanhha :data="$data" :item="$item" :child="$Con" />
								</div>
								@endforeach
								@else
									@if($data->TinhTrang == 1)
									<div class="post">
										<h5><i class="fa-solid fa-circle-info"></i> {{ trans('ngkhoa.chuacothongtin')}} </h5>
									</div>
									@else
									<div class="post">
										<h5><i class="fa-solid fa-circle-info"></i> {{ trans('ngkhoa.khongvo')}} </h5>
									</div>
									@endif
								@endif
							</div>
			
							<!-- Thong tin Ke That -->
							@if(isset($KeThat))
							<div class="tab-pane fade" id="kethat" role="tabpanel" aria-label="kethat">
								@foreach ($KeThat as $item)
								<div class="post">
									<x-giapha.phoingau :data="$item" :phoingau="trans('ngkhoa.kethat')" />
									<x-giapha.sanhha :data="$data" :item="$item" :child="$Con" />
								</div>
								@endforeach
							</div>
							@endif
			
							<!-- Thong tin Thu That -->
							@if(isset($ThuThat))
							<div class="tab-pane fade" id="thuthat" role="tabpanel" aria-labelledby="thuthat">
								@foreach ($ThuThat as $item)
								<div class="post">
									<x-giapha.phoingau :data="$item" :phoingau="trans('ngkhoa.thuthat')" />
									<x-giapha.sanhha :data="$data" :item="$item" :child="$Con" />        
								</div>
								@endforeach
							</div>
							@endif
			
							<!-- Thong tin Trac That -->
							@if(isset($TracThat))
							<div class="tab-pane fade" id="tracthat" role="tabpanel" aria-labelledby="tracthat">
								@foreach ($TracThat as $item)
								<div class="post">
									<x-giapha.phoingau :data="$item" :phoingau="trans('ngkhoa.tracthat')"/>
									<x-giapha.sanhha :data="$data" :item="$item" :child="$Con" />
								</div>
								@endforeach
							</div>
							@endif
			
							<!-- Thong tin Y That -->
							@if(isset($YThat))
							<div class="tab-pane fade" id="ythat" role="tabpanel" aria-labelledby="ythat">
								@foreach ($YThat as $item)
								<div class="post">
									<x-giapha.phoingau :data="$item" :phoingau="trans('ngkhoa.ythat')"/>
									<x-giapha.sanhha :data="$data" :item="$item" :child="$Con" />
								</div>
								@endforeach
							</div>
							@endif
			
							<!-- Thong tin Su Nghiep -->
							@if(!$data->phongtang->isEmpty() || !$data->chucvi->isEmpty() )
							<div class="tab-pane fade" id="sunghiep" role="tabpanel">
								@if(!$data->phongtang->isEmpty())
								<div class="post">
									<p class="text-primary"><strong><i class="fas fa-award mr-1"></i> {{trans('ngkhoa.phongtang')}}</strong></p>
									@foreach ($data->phongtang as $phongtang)
										<li>{{$phongtang->TenPhongTang}} @if(isset($phongtang->ThoiDiemPhongTang)) {{$phongtang->ThoiDiemPhongTang}} @endif </li>
									@endforeach
								</div>
								
								<hr>
								@endif
			
								@if(!$data->chucvi->isEmpty())
								<p class="text-primary"><strong><i class="fas fa-briefcase mr-1"></i> {{trans('ngkhoa.chucvi')}}</h4></strong></p>
								<!-- The timeline -->
								<div class="timeline timeline-inverse">
									<!-- timeline time label -->
									@foreach ($data->chucvi as $chucvi)
									<div class="time-label">
										<span class="bg1-danger">
											@if (isset($chucvi->ThoiDiem)) {{$chucvi->ThoiDiem}} @else {{trans('ngkhoa.khongro')}} @endif
										</span>
									</div>
									<!-- /.timeline-label -->
									<!-- timeline item -->
									<div>
										<i class="fas fa-briefcase bg-primary"></i>
										<div class="timeline-item">
											<h4 class="timeline-header">{{$chucvi->TenChucVi}}</h4>
										</div>
									</div>
									@endforeach
								</div>
								<!-- END timeline item -->
								<div>
									<i class="far fa-clock bg-gray"></i>
								</div>  
								@endif
							</div>
							@endif
			
							<!-- Cac thong tin khac -->
							@if(!$data->lienket->isEmpty() || isset($data->GhiChu))
							<div class="tab-pane fade" id="khac" role="tabpanel">    
								@if(!$data->lienket->isEmpty())
								<p class="text-secondary"><strong><i class="fa-solid fa-link"></i> {{trans('ngkhoa.lienket')}}</h5></strong></p>
								
									@foreach ($data->lienket as $lienket)
										<li><a href="{{$lienket->URL}}" target=_blank>{{$lienket->TenLienKet}}</a></li>
									@endforeach
								
								@endif
						
								@if (isset($data->GhiChu))
								<hr>
									<blockquote class="quote-danger">
										<h5 id="note">{{ trans('ngkhoa.ghichu') }}</h5>
										{!! $data->GhiChu!!}
									</blockquote>
								@endif
							</div>
							@endif
						</div>
					</div>        
				</div>
				<!-- /.tab-content -->
			</div>

		</div>

		<div class="row">		
			@role('super-admin')
			<div class="card-footer">
				<div class="btn-group col-md-1" role="group">
					<x-buttons.index-edit :route="'nguoi.edit'" :id="$data->MaNguoi" />
				</div>
				<div class="btn-group col-md-1" role="group">
				@if($data->GioiTinh == 1)
					<x-buttons.index-create :route="'nguoi.create'" :id="$data->MaNguoi" />&nbsp;											
				@else
					<x-buttons.index-create :route="'ngoai.create'" :id="$data->MaNguoi" />&nbsp;
				@endif
				</div>
				<div class="btn-group col-md-1" role="group">
					<x-buttons.index-spouse :id="$data->MaNguoi" />
				</div>
			</div>
			@endrole
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