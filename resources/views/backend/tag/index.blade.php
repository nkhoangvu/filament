@extends('layouts.backend.default')

@section('pageTitle') {{ trans('common.tag')}} @endsection
@section('tag_sb', 'active')
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
						@if($data->isNotEmpty())
				 		<table id="mainTable" class="table wrap-list-est table-bordered table-fixed-header" cellspacing="0" width="100%">
               				<thead>
	               				<tr>
									<th width="35%">{{ trans('common.name')}}</th>
									<th width="45%">{{ trans('common.slug')}}</th>
                					<th width="20%">{{ trans('common.action') }}</th>
               		            </tr>
               		        </thead>
                            <tbody>
               		        	@foreach ($data as $item)
               				    <tr>
									<td width="35%">{{$item->name}}</td>
									<td width="45%">{{$item->slug}}</td>
									<td width="20%" class="text-center">
										<x-buttons.button-edit route="tag.edit" :id="$item->id" />
										<x-buttons.button-delete route="tag.delete" :id="$item->id" />
									</td>
               				    </tr>
               					@endforeach
               				</tbody>
               				<tfoot>
               					<tr>
									<th width="35%">{{ trans('common.name')}}</th>
									<th width="45%">{{ trans('common.slug')}}</th>
                					<th width="20%" class="text-center">{{ trans('common.action') }}</th>
               		            </tr>
               				</tfoot>
               			</table>	
						@else
							{{ trans('common.no_data')}}
						@endif
				 	</div>
				</div>
			</div>
		</div>
		<x-buttons.button-create route="tag.create" />	
	</div>
</section>
	
@endsection

@section('script')

	@include('scripts.backend.datatables') 
	@include('scripts.backend.index-3-col')
@endsection
