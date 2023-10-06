
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('ngkhoa.lienket')}} @endsection
@section('lienket_sb', 'active')

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
				  		<h3 class="card-title">{{ trans('common.list')}}</h3>
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
				 		<table id="mainTable" class="table wrap-list-est table-bordered table-fixed-header" cellspacing="0" width="100%">
               				<thead>
	               				<tr>
									<th width="10%">{{ trans('common.id')}}</th>
									<th width="15%">{{ trans('ngkhoa.nguoi')}}</th>
									<th width="30%">{{ trans('ngkhoa.lienket_name')}}</th>
									<th width="30%">{{ trans('ngkhoa.url')}}</th>
                					<th width="15%">{{ trans('common.action') }}</th>
               		            </tr>
               		        </thead>
                            <tbody>
               		        	@foreach ($data as $item)
               				    <tr>
									<td width="10%" class="text-center">{{$item->MaLienKet}}</td>
									<td width="15%"><x-giapha.ten :data="$item->nguoi" /></td>
									<td width="30">{{ $item->TenLienKet }}</a></td>
									<td width="30" class="text-center">{{ $item->URL }}</td>
									<td width="15%" class="text-center">
										<x-buttons.index-edit route="lienket.edit" :id="$item->MaLienKet" />
										<x-buttons.index-delete route="lienket.delete" :id="$item->MaLienKet" />
									</td>
               				    </tr>
               					@endforeach
               				</tbody>
               				<tfoot>
               					<tr>
									<th width="10%">{{ trans('common.id')}}</th>
									<th width="15%">{{ trans('ngkhoa.nguoi')}}</th>
									<th width="30%">{{ trans('ngkhoa.lienket_name')}}</th>
									<th width="30%">{{ trans('ngkhoa.url')}}</th>
                					<th width="15%">{{ trans('common.action') }}</th>
               		            </tr>
               				</tfoot>
               			</table>
				 	</div>
				</div>
			</div>
		</div>
		<x-buttons.footer-create route="lienket.create" />
	</div>
</section>

@endsection

@section('script')

	@include('scripts.backend.datatables') 
	@includeif('scripts.backend.index-5-col') 	
	
@endsection
