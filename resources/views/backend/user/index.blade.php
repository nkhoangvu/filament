
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.users')}} @endsection
@section('user_main_sb', 'menu-open')
@section('user_sb', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('common.user') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('common.dashboard') }}</a></li>
					<li class="breadcrumb-item active">{{ trans('common.users')}}</li>
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
				  		<h3 class="card-title">{{ trans('common.users')}}</h3>
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
    	                            <th width="20%">{{ trans('common.fullname')}}</th>
									<th width="20%">{{ trans('common.email')}}</th>
									<th width="10%">{{ trans('common.username')}}</th>
									<th width="15%">{{ trans('common.role')}}</th>
                					<th width="20%">{{ trans('common.group')}}</th>
                					<th width="15%">Action</th>
               		            </tr>
               		        </thead>
                            <tbody>
               		        	@foreach ($data as $item)
               				    <tr>
               				     	<td width="20%">{{$item->name}}</td>
									<td width="20%">{{$item->email}}</td>
									<td width="10%" class="text-center">{{ $item->username }}</td>
									<td width="15%" class="text-center">{{ $item->role }}</td>
                                    <td width="20%" class="text-center">{{ $item->group }}</td>
                                    <td width="15%" class="text-center">
										<a class="btn btn-sm btn-primary" id="edit-{{$item->id}}" href="{{ route('user.edit', ['id'=>$item->id]) }}" title="{{ trans('common.edit') }}">
											<i class="fa-solid fa-pen-to-square"></i>
										</a>											
										<a class="btn btn-sm btn-warning" id="edit-{{$item->id}}" href="{{ route('user.editpass', ['id'=>$item->id]) }}" title="{{ trans('common.setpass') }}">
											<i class="fa-solid fa-key"></i>
										</a>											
										<a class="btn btn-sm btn-danger" id="delete-{{$item->id}}" onclick="return confirm('Are you sure ?');" href="{{ route('user.delete', ['id'=>$item->id]) }}" title="{{ trans('common.delete') }}">
											<i class="fa-solid fa-trash-can"></i>
										</a>
									</td>
               				    </tr>
               					@endforeach
               				</tbody>
               				<tfoot>
               					<tr>
                                    <th width="20%">Name</th>
									<th width="20%">Email</th>
									<th width="10%">Core ID</th>
									<th width="15%">Role</th>
               						<th width="20%">Department</th>
               						<th width="15%" class="text-center">Action</th>
               		            </tr>
               				</tfoot>
               			</table>
				 	</div>
				</div>
			</div>
		</div>
		<x-buttons.footer-create :route="'user.create'" />
	</div>
</section>
	
@endsection

@section('script')

	@include('scripts.backend.index-6-col')

@endsection
