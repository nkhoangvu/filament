@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.chucvi_giao') }} @endsection
@section('package_sb', 'active')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('ngkhoa.chucvi')}}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('common.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('chucvi.index') }}">{{ trans('ngkhoa.chucvi')}}</a></li>
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
		<form class="form-horizontal" id="paymentForm" action="{{ route('chucvi.add', [$data->MaNguoi]) }}" method="POST" enctype="multipart/form-data">
		@csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('ngkhoa.nguoi') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-nguoi-info :data="$data" />
                    </div>
                </div>
            </div>
        </div>
       
        @if(!$ChucVi_DN->isEmpty())
        <div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
				  		<h3 class="card-title">{{ trans('ngkhoa.chucvi_dn') }}</h3>
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
									<th width="20%" class="text-center">{{ trans('ngkhoa.chucvi') }}</th>
									<th width="15%" class="text-center">{{ trans('ngkhoa.thoidiem') }}</th>
									<th width="30%" class="text-center">{{ trans('ngkhoa.diengiai') }}</th> 
									<th width="20%" class="text-center">{{ trans('common.action') }}</th>
                				</tr>
                			</thead>
                    		<tbody>
								@foreach ($ChucVi_DN as $chucvi)
								<tr>
									<td width="20%" class="text-center">{{ $chucvi->TenChucVi }}</td>
									<td width="15%" class="text-center">{{ $chucvi->ThoiDiem }}</td>
									<td width="30%" class="text-center">{{ $chucvi->DienGiai }}</td>
									<td width="20%" class="text-center">
										<x-buttons.index-delete :route="'chucvi.remove'" :id="$chucvi->MaChucVi" />
									</td>
								</tr>
								@endforeach
                			</tbody>
                		</table>
					</div>
				</div>
			</div>
		</div>
        @else
        
		<x-note :value="trans('ngkhoa.chucvi_chua')" />
		
        @endif

		<!-- Danh sach Chuc Vi -->

        @if(!$ChucVi->isEmpty())
		<hr>
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">{{ trans('ngkhoa.chucvi_ds') }}</h3>
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
									<th width="25%" class="text-center">{{ trans('ngkhoa.chucvi') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.thoidiem') }}</th>
									<th width="35%" class="text-center">{{ trans('ngkhoa.diengiai') }}</th> 
									<th width="20%" class="text-center">{{ trans('common.action') }}</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($ChucVi as $item)
								<tr>
									<td width="25%" class="text-center">{{ $item->TenChucVi }}</td>
									<td width="20%" class="text-center">{{ $item->ThoiDiem }}</td>
									<td width="35%" class="text-center">{{ $item->DienGiai }}</td>
									<td width="20%" class="text-center">
										<x-buttons.assign :id="$item->MaChucVi" />
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th width="25%" class="text-center">{{ trans('ngkhoa.chucvi') }}</th>
									<th width="20%" class="text-center">{{ trans('ngkhoa.thoidiem') }}</th>
									<th width="35%" class="text-center">{{ trans('ngkhoa.diengiai') }}</th> 
									<th width="20%" class="text-center">{{ trans('common.action') }}</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
		@else

		<x-note :value="trans('ngkhoa.chucvi_khong')" />
		
		@endif
        </form>
    </div>
	
	<x-buttons.footer-reset :route="'nguoi.index'" :label="trans('common.back')"/>
</section>
@endsection