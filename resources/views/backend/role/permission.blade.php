
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.permission_assign') }} @endsection
@section('user_main_sb', 'menu-open')
@section('role_sb', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('common.permission_assign')}}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">{{ trans('common.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/role">{{ trans('common.role')}}</a></li>
					<li class="breadcrumb-item active">{{ trans('common.permission_assign')}}</a></li>
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
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">{{ trans('common.role') }}</h3>
					  	<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<!-- Content begin -->
					<div class="card-body">
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-3" for="name">{{ trans('common.code')}}</label>
								<div class="col-md-10">
									<input type="text" id="name" class="form-control" value={{$data->name}} name="code" disabled/>
								</div>
							</div>
							<div class="form-group col">
								<label class="control-label col-md-3" for="name">{{ trans('common.displayname')}}</label>
								<div class="col-md-10">
									<input type="text" id="name" class="form-control" value={{$data->display_name}} name="display_name" disabled/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				@if(count($permissionassigned) > 0)
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">{{ trans('common.permissions_added') }}</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<table id="addedTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
						   	<thead>
							   	<tr>
									<th width="15%">{{ trans('common.name')}}</th> 
									<th width="25%">{{ trans('common.displayname')}}</th>
									<th width="50%">{{ trans('common.description')}}</th>										
									<th width="10%">{{ trans('common.action')}}</th>										
								</tr>
						   	</thead>
						   	<tbody>								   
						   		@foreach ($permissionassigned as $itemassigned)
								<tr>
									<td width="15%">{{ $itemassigned->name }}</td> 
							   		<td width="25%" >{{ $itemassigned->displayname }}</td>
							   		<td width="50%" align="center">{{ $itemassigned->description }}</td>										
									<td width="10%" align="center">										
										<a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?');" href="{{ route('role.permissionremove', ['id'=>$data->id, 'permission_id'=>$itemassigned->permission_id]) }}">
											<i class="fa-solid fa-square-minus"></i>&nbsp;{{ trans('common.remove') }}
										</a>
									</td>
							  	</tr>
							  	@endforeach
							</tbody>
							<tfoot>
								<tr>
								 <th width="15%">{{ trans('common.name')}}</th> 
								 <th width="25%">{{ trans('common.displayname')}}</th>
								 <th width="50%">{{ trans('common.description')}}</th>										
								 <th width="10%">{{ trans('common.action')}}</th>										
							 </tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			@else
			<div class="col-md-12">
				<div class="callout callout-danger">
					<h5><i class="fas fa-info"></i> {{ trans('common.note')}}:</h5>
					<p class="text-danger">{{ trans('common.permissions_no') }}</p>
				</div>
			</div>
			@endif
			@if(count($permission) > 0)
			<div class="col-md-12">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">{{ trans('common.permissions') }}</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" id="mainForm" action="{{ route('role.permissionassign', [$data->id]) }}" method="POST" enctype="multipart/form-data">
							@csrf
						<table id="mainTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
						   	<thead>
							   	<tr>
									<th width="15%">{{ trans('common.name')}}</th> 
									<th width="25%">{{ trans('common.displayname')}}</th>
									<th width="50%">{{ trans('common.description')}}</th>										
									<th width="10%">{{ trans('common.action')}}</th>										
								</tr>
							</thead>
						  	<tbody>								   
						  		@foreach ($permission as $item)
								<tr>
									<td width="15%">{{ $item->name }}</td> 
							   		<td width="25%" >{{ $item->display_name }}</td>
							   		<td width="50%" align="center">{{ $item->description }}</td>										
									<td width="10%" align="center">
										<button class="btn btn-sm btn-success" name="permission" type="submit" value="{{$item->id}}"><i class="fa-solid fa-square-plus"></i>&nbsp;&nbsp;Add</button>	
									</td>
							  	</tr>
							  	@endforeach
						  	</tbody>
						</table>
					</div>
				</div>
				@else
				<div class="col-md-12">
					<div class="callout callout-success">
						<h5><i class="fas fa-info"></i> {{ trans('common.note')}}:</h5>
						<p class="text-success">{{ trans('common.permissions_all') }}</p>
					</div>
				</div>
				@endif
			</div>

			<div class="col-md-12">
				<div class="card-footer">
					<div class="btn-group col-md-2" role="group">
						<a href="javascript:;" id="reset-table" class="btn btn-default"><i class="fa-solid fa-window-restore"></i>&nbsp; &nbsp;{{ trans('common.reset') }}</a>
					</div>
					<div class="btn-group col-md-2" role="group">
						<a class="btn btn-default" href="{{ route('role.index') }}"><i class="fa-solid fa-square-plus"></i>&nbsp;&nbsp;{{ trans('common.cancel') }}</a>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	var height_table = 640;
	$(document).ready(function() {
		// Setup - add a text input to each footer cell
		$('#mainTable tfoot th').each( function (index ) {
			if(index != 3)
			{
				var title = $(this).text();
				$(this).html( '<input type="text" placeholder="{{ trans('common.filter') }} - '+title+'" style="width: 100%"/>' );
			}
		} );

		var table = $('#mainTable').DataTable({
			"language": {
				"emptyTable": "テーブルにデータがありません",
				"info": " _TOTAL_ 件中 _START_ から _END_ まで表示",
				"infoEmpty": " 0 件中 0 から 0 まで表示",
				"infoFiltered": "（全 _MAX_ 件より抽出）",
				"infoThousands": ",",
				"lengthMenu": "_MENU_ 件表示",
				"search": "検索:",
				"zeroRecords": "一致するレコードがありません",
				"paginate": {
					"first": "先頭",
					"last": "最終",
					"next": "次",
					"previous": "前"
					},
				},
			"responsive": true, 
			"paging": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"lengthChange": true, 
			"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
			"autoWidth": false,
			"stateSave": true,
		} );

		// Apply the search
		table.columns().every( function () {
			var that = this;
	 
			$('input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			} );
		} );

		var table = $('#addedTable').DataTable({
			"language": {
				"emptyTable": "テーブルにデータがありません",
				"info": " _TOTAL_ 件中 _START_ から _END_ まで表示",
				"infoEmpty": " 0 件中 0 から 0 まで表示",
				"infoFiltered": "（全 _MAX_ 件より抽出）",
				"infoThousands": ",",
				"lengthMenu": "_MENU_ 件表示",
				"search": "検索:",
				"zeroRecords": "一致するレコードがありません",
				"paginate": {
					"first": "先頭",
					"last": "最終",
					"next": "次",
					"previous": "前"
					},
				},
			"responsive": true, 
			"paging": true,
			"searching": false,
			"ordering": true,
			"info": true,
			"lengthChange": false, 
			"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
			"autoWidth": false,
			"stateSave": true,
		} );

		$("#reset-table").click(function(){
			table.state.clear();
			window.location.reload();
		});
	
	});


</script>
@endsection