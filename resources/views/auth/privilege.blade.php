
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.privilege')}} @endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('common.privilege') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item active">{{ trans('common.privilege')}}</li>
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
				  		<h3 class="card-title">{{ trans('common.user_info')}}</h3>
						  <div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
    				<div class="card-body">
						<div class="row">
							<div class="form-group col">
								<label class="control-label col-md-3" for="coreid">Username</label>
								<div class="input-group col-md-10">
									<div class="input-group-prepend">
										<span class="input-group-text">#</span>
									</div>
									<input type="text" id="username" value="{{$data->username}}" class="form-control" name="username" disabled/>
								</div>
							</div>					
							<div class="form-group col">
								<label class="control-label col-md-3" for="email">Role</label>
								<div class="input-group col-md-10">
									<div class="input-group-prepend">
										<span class="input-group-text">!</span>
									</div>
									<input type="text" id="email" value="{{ Auth::user()->roles->pluck('display_name')->first() }}" class="form-control" name="email" disabled/>
								</div>
							</div>
						</div>	
					</div>
				</div>
				@if ($permission->isNotEmpty())
				<div class="card card-primary">
					<div class="card-header">
			  			<h3 class="card-title">{{ trans('common.permissions')}}</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
    				<div class="card-body">
						<table id="mainTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
						   	<thead>
							   	<tr>
									<th width="15%">{{ trans('common.name')}}</th> 
									<th width="25%">{{ trans('common.displayname')}}</th>
									<th width="50%">{{ trans('common.description')}}</th>										
								</tr>
							</thead>
							<tbody>								   
								@foreach ($permission as $item)
								<tr>
									<td width="15%">{{ $item->name }}</td> 
							   		<td width="25%">{{ $item->display_name }}</td>
							   		<td width="50%">{{ $item->description }}</td>										
							  	</tr>
							  	@endforeach
							</tbody>
						</table>
					</div>
				</div>				
				@endif
			</div>
		</div>
		<div class="col-12">
			<div class="card card-primary">	
				<div class="card-footer" >
					<div class="btn-group col-md-2" role="group">
						<a class="btn btn-default" href="{{ route('home') }}">Cancel</a>
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
			"lengthChange": false, 
			"lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]],
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

		$("#reset-table").click(function(){
			table.state.clear();
			window.location.reload();
		});
	
	});


</script>
@endsection