@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.phongtang') }} @endsection
@section('phongtang_sb', 'active')

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
				  		<h3 class="card-title">{{ trans('ngkhoa.phongtang_ds') }}</h3>
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
									<th width="15%" class="text-center">{{ trans('ngkhoa.nguoi') }}</th>
									<th width="25%" class="text-center">{{ trans('ngkhoa.phongtang') }}</th>
									<th width="15%" class="text-center">{{ trans('ngkhoa.thoidiem') }}</th>
									<th width="30%" class="text-center">{{ trans('ngkhoa.ghichu') }}</th> 
									<th width="15%" class="text-center">{{ trans('common.action') }}</th>
                				</tr>
                			</thead>
                    		<tbody>
								@foreach ($data as $item)
								<tr>
									<td width="15%"class="text-center"><a href="{{ route('nguoi.show', ['id'=>$item->MaNguoi]) }}"><x-giapha.ten :data="$item" /></td>
									<td width="25%" class="text-center">{{ $item->TenPhongTang }}</td>
									<td width="15%" class="text-center">{{ $item->ThoiDiem }}</td>
									<td width="30%" class="text-center">{{ $item->GhiChu }}</td>
									<td width="15%" class="text-center">
										<x-buttons.index-edit route="phongtang.edit" :id="$item->MaPhongTang" />
										<x-buttons.index-delete route="phongtang.delete" :id="$item->MaPhongTang" />
									</td>
								</tr>
								@endforeach
                			</tbody>
                			<tfoot>
								<tr>
									<th width="15%" class="text-center">{{ trans('ngkhoa.nguoi') }}</th>
									<th width="25%" class="text-center">{{ trans('ngkhoa.chucvi') }}</th>
									<th width="15%" class="text-center">{{ trans('ngkhoa.thoidiem') }}</th>
									<th width="30%" class="text-center">{{ trans('ngkhoa.diengiai') }}</th> 
									<th width="15%" class="text-center">{{ trans('common.action') }}</th>
								</tr>
    						</tfoot>
                		</table>
					</div>
				</div>
			</div>
		</div>
	
		<x-buttons.footer-create :route="'phongtang.create'" />
	</div>
</section>			
@endsection

@section('script')

	@include('scripts.backend.datatables') 
	@includeif('scripts.backend.index-5-col') 	

@endsection
