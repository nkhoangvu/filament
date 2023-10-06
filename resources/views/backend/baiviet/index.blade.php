
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.post')}} @endsection
@section('baiviet_sb', 'active')

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
					<li class="breadcrumb-item active">{{ trans('common.post')}}</li>
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
									<th width="5%">{{ trans('common.id')}}</th>
									<th width="15%">{{ trans('common.category')}}</th>
									<th width="50%">{{ trans('common.title')}}</th>
									<th width="10%">{{ trans('common.date')}}</th>
									<th width="8%">{{ trans('common.published')}}</th>
                					<th width="12%">{{ trans('common.action')}}</th>
               		            </tr>
               		        </thead>
                            <tbody>
               		        	@foreach ($data as $item)
               				    <tr>
									<td width="5%" class="text-center">{{$item->id}}</td>
									<td width="15%" class="show-read-more">{{ $item->category->name }}</td>
									<td width="50%">{{$item->title}}</td>
									<td width="10%" class="text-center">{{formatDate($item->created_at)}}</td>
									<td width="8%" class="text-center">@if ($item->published == 1) Yes @else No @endif</td>
									<td width="12%" class="text-center">
										<x-buttons.index-edit :route="'baiviet.edit'" :id="$item->id" />
										<x-buttons.index-delete :route="'baiviet.delete'" :id="$item->id" />
									</td>
               				    </tr>
               					@endforeach
               				</tbody>
               				<tfoot>
               					<tr>
									<th width="5%">{{ trans('common.id')}}</th>
									<th width="15%">{{ trans('common.category')}}</th>
									<th width="50%">{{ trans('common.title')}}</th>
									<th width="10%">{{ trans('common.date')}}</th>
									<th width="8%">{{ trans('common.published')}}</th>
									<th width="12%" class="text-center">{{ trans('common.action')}}</th>
               		            </tr>
               				</tfoot>
               			</table>
				 	</div>
				</div>
			</div>
		</div>
		<x-buttons.footer-create :route="'baiviet.create'" />
	</div>
</section>
	
@endsection

@section('script')
	
	@include('scripts.backend.datatables') 
	@include('scripts.backend.index-6-col')
	
@endsection
