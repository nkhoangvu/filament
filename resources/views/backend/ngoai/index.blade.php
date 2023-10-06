@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.ngoai') }} @endsection
@section('ngoai_sb', 'active')

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
				  		<h3 class="card-title">{{ trans('ngkhoa.ngoai_ds') }}</h3>
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
									<th width="15%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
									<th width="8%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.ngaysinh') }}</th>
									<th width="8%" class="text-center">{{ trans('ngkhoa.con') }}</th> 
									<th width="16%" class="text-center">{{ trans('ngkhoa.cha') }}</th> 
									<th width="18%" class="text-center">{{ trans('ngkhoa.me') }}</th> 
									<th width="15%" class="text-center">{{ trans('common.action') }}</th>
                				</tr>
                			</thead>
                    		<tbody>
								@foreach ($data as $item)
								<tr>
									<td width="15%"class="text-center"><x-giapha.ten :data="$item" /></td>
									<td width="8%" class="text-center">	<x-giapha.gioitinh :data="$item" /></td>
									<td width="20%" class="text-center">{{ $item->NgaySinh }}</td>
									<td width="8%" class="text-center">{{$item->ConThu}}</td>
									<td width="16%" class="text-center">
										<a href="{{ route('daure.show', ['id'=>$item->MaCha]) }}">
											<x-giapha.ten :data="$item->cha" />
										</a>
									</td>
									<td width="18%" class="text-center">
										<a href="{{ route('nguoi.show', ['id'=>$item->MaMe]) }}">
											<x-giapha.ten :data="$item->me" />
										</a>
									</td>
									<td width="15%" class="text-center">
										<x-buttons.index-edit route="ngoai.edit" :id="$item->MaNgoai" />
										<x-buttons.index-delete route="ngoai.delete" :id="$item->MaNgoai" />
									</td>
								</tr>
								@endforeach
                			</tbody>
                			<tfoot>
								<tr>
									<th width="15%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
									<th width="8%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.ngaysinh') }}</th>
									<th width="8%" class="text-center">{{ trans('ngkhoa.con') }}</th> 
									<th width="16%" class="text-center">{{ trans('ngkhoa.cha') }}</th> 
									<th width="18%" class="text-center">{{ trans('ngkhoa.me') }}</th> 
									<th width="15%" class="text-center">{{ trans('common.action') }}</th>
                				</tr>
    						</tfoot>
                		</table>
					</div>
				</div>
			</div>
		</div>
		<x-buttons.footer-reset  />
	</div>
</section>			
@endsection

@section('script')
	
	@include('scripts.backend.datatables')	
	@include('scripts.backend.index-7-col')

@endsection
