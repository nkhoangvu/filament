
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.permission')}} @endsection
@section('user_main_sb', 'menu-open')
@section('permission_sb', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('common.permission') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('common.dashboard') }}</a></li>
					<li class="breadcrumb-item active">{{ trans('common.permission') }}</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Notification -->
		@includeif('backend.partials.message') 
		<!-- Content -->
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
				  		<h3 class="card-title">{{ trans('common.permissions') }}</h3>
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
                       				<th width="20%">{{ trans('common.permission') }}</th>
									<th width="20%">{{ trans('common.name') }}</th>
									<th width="50%">{{ trans('common.description') }}</th>
									<th width="10%">{{ trans('common.action') }}</th>
		        				</tr>
            				</thead>
            				<tbody>
           						@foreach ($data as $item)
        						<tr>
                 					<td width="20%">{{$item->name}}</td>
									<td width="20%">{{$item->display_name}}</td>
									<td width="50%">{{$item->description}}</td>
                    				<td width="10%" class="text-center">
										@permission('user-update')
										<a class="btn btn-sm btn-primary" id="edit-{{$item->id}}" href="{{ route('permission.edit', ['id'=>$item->id]) }}">
											<i class="fa-solid fa-pen-to-square"></i>&nbsp;{{ trans('common.edit') }}
										</a>											
										@endpermission
									</td>
			                	</tr>
            			    	@endforeach
            				</tbody>
            				<tfoot>
            					<tr>
									<th width="20%">{{ trans('common.permission') }}</th>
									<th width="20%">{{ trans('common.ame') }}</th>
									<th width="50%">{{ trans('common.description') }}</th>
									<th width="10%" class="text-center">{{ trans('common.action') }}</th>
                				</tr>                				
							</tfoot>
						</table>
					</div>
				</div>
				<div class="card-footer">
					<div class="btn-group col-md-2" role="group">
						<a href="javascript:;" id="reset-table" class="btn btn-default"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> {{ trans('common.reset') }}</a>
					</div>
					<div class="btn-group col-md-2" role="group">
						<a href="{{ route('permission.create') }}" class="btn btn-primary">{{ trans('common.permission_new')}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection


@section('script')
	@includeif('backend.scripts.index-4-col') 	
@endsection