@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.phoingau') }} @endsection
@section('phoingau_sb', 'active')

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
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
				  		<h3 class="card-title">{{ trans('ngkhoa.phoingau_ds') }}</h3>
				  		<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					  			<i class="fas fa-times"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<table id="mainTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
                			<thead>
                				<tr>
									<th width="20%" class="text-center">{{ trans('ngkhoa.chong_vo') }}</th>
									<th width="10%" class="text-center">{{ trans('ngkhoa.doi') }}</th>
									<th width="10%" class="text-center">{{ trans('ngkhoa.nhanh') }}</th>
									<th width="10%" class="text-center">{{ trans('ngkhoa.phoingau_ten') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.phoingau_nguoi') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.phoingau_thoigian') }}</th> 
									<th width="10%" class="text-center">{{ trans('common.action') }}</th>
                				</tr>
                			</thead>
                    		<tbody>
								@foreach ($data as $item)
								<tr>
									<td width="20%"class="text-center">
										<a target="_blank" href="{{route('nguoi.view',[$item->MaNguoi])}})">
											<x-giapha.ten :data="$item" />
										<a>
									</td>
									<td width="10%" class="text-center">{{$item->MaDoi}} </td>
									<td width="10%" class="text-center">{{$item->MaNhanh}} </td>
									<td width="10%" class="text-center">{{$item->TenLoaiPhoiNgau}} </td>
									<td width="20%" class="text-center">{{ $item->HoPhoiNgau }} {{ $item->TenDemPhoiNgau }} {{ $item->TenPhoiNgau }}</td>
									<td width="20%" class="text-center">@if (isset($item->BatDau) || $item->KetThuc) {{ $item->BatDau }} - {{ $item->BatDau }} @else {{ trans('ngkhoa.trondoi') }} @endif</td>
									<td width="10%" class="text-center">
										<x-buttons.index-edit route="phoingau.create" :id="$item->MaNguoi" />
									</td>
								</tr>
								@endforeach
                			</tbody>
                			<tfoot>
								<tr>
									<th width="20%" class="text-center">{{ trans('ngkhoa.chong_vo') }}</th>
									<th width="10%" class="text-center">{{ trans('ngkhoa.doi') }}</th>
									<th width="10%" class="text-center">{{ trans('ngkhoa.nhanh') }}</th>
									<th width="10%" class="text-center">{{ trans('ngkhoa.phoingau_ten') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.phoingau') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.phoingau_thoigian') }}</th> 
									<th width="10%" class="text-center">{{ trans('common.action') }}</th>
								</tr>
    						</tfoot>
                		</table>
					</div>
				</div>
			</div>
		</div>

		<x-buttons.footer-reset :route="'nguoi.index'" :label="trans('ngkhoa.nguoi')"/>
	</div>
</section>			
@endsection

@section('script')

	@include('scripts.backend.datatables')	
	@include('scripts.backend.index-7-col') 	

@endsection
