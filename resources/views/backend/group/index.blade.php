
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.group') }} @endsection
@section('user_main_sb', 'menu-open')
@section('department_sb', 'active')

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
					<li class="breadcrumb-item">@yield('pageTitle')</li>
				</ol>
			</div>
		</div>
	</div>
</section>


<!-- Main content -->
<section class="content">
	<div class="container-fluid">

		<!-- Notification -->
		@includeif('partials.message') 
		
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
					 	<table id="mainTable" class="table table-bordered table-striped wrap-list-est" cellspacing="0" width="100%">
                			<thead>
                				<tr>
                					<th width="5%">No.</th> 
                                    <th width="40%">{{ trans('common.name')}}</th>
                					<th width="40%">{{ trans('common.location')}}</th>
                					<th width="15%">{{ trans('common.action')}}</th>
                		        </tr>
                		    </thead>
                            <tbody>
                		       	@foreach ($data as $item)
                			    <tr>
                				   	<td width="5%" class="text-center">{{$item->id}}</td>
                			     	<td width="40%" class="text-center">{{$item->name}}</td>
									<td width="40%" class="text-center">{{$item->location}}</td>
                                    <td width="15%" class="text-center">
										<x-buttons.index-edit route="group.edit" :id="$item->id" />
										<x-buttons.index-delete route="group.delete" :id="$item->id" />
									</td>
                			    </tr>
                				@endforeach
                			</tbody>
                			<tfoot>
								<tr>
                					<th width="5%" class="text-center">No.</th> 
                                    <th width="40%">{{ trans('common.name')}}</th>
                					<th width="40%">{{ trans('common.location')}}</th>
                					<th width="15%" class="text-center">{{ trans('common.action')}}</th>
                		        </tr>
                			</tfoot>
                		</table>
					</div>
				</div>
			</div>
		</div>	
		<x-buttons.footer-create :route="'group.create'" />
	</div>
	
</section>
@endsection

@section('script')

	@includeif('backend.scripts.index-4-col') 	

@endsection