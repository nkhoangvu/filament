
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.role')}} @endsection
@section('user_main_sb', 'menu-open')
@section('role_sb', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('common.role') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">{{ trans('common.home') }}</a></li>
					<li class="breadcrumb-item active">{{ trans('common.role') }}</li>
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
				  		<h3 class="card-title">{{ trans('common.roles') }}</h3>
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
                       				<th width="15%">{{ trans('common.role') }}</th>
									<th width="20%">{{ trans('common.name') }}</th>
									<th width="40%">{{ trans('common.description') }}</th>
									<th width="25%">{{ trans('common.action') }}</th>
		        				</tr>
            				</thead>
            				<tbody>
           						@foreach ($data as $item)
        						<tr>
                 					<td width="15%">{{$item->name}}</td>
									<td width="20%">
										<a href="{{ route('role.permission', ['id'=>$item->id]) }}">{{$item->display_name}}</a>
									</td>
									<td width="40%">{{$item->description}}</td>
                    				<td width="25%" class="text-center">		
										<a class="btn btn-sm btn-primary" id="edit-{{$item->id}}" href="{{ route('role.edit', ['id'=>$item->id]) }}">
											<i class="fa-solid fa-pen-to-square"></i>&nbsp;{{ trans('common.edit') }}
										</a>
										@role('super-admin')								
										<a class="btn btn-sm btn-warning" id="edit-{{$item->id}}" href="{{ route('role.permission', ['id'=>$item->id]) }}">
											<i class="fa-solid fa-pen-to-square"></i>&nbsp;{{ trans('common.permission_assign') }}
										</a>
										<a class="btn btn-sm btn-danger" id="delete-{{$item->id}}" onclick="return confirm('Are you sure ?');" href="{{ route('role.delete', ['id'=>$item->id]) }}">
											<i class="fa-solid fa-trash-can"></i>&nbsp;{{ trans('common.delete') }}
										</a>
										@endrole
									</td>
			                	</tr>
            			    	@endforeach
            				</tbody>
            				<tfoot>
            					<tr>
									<th width="15%" class="text-center">{{ trans('common.role') }}</th>
									<th width="20%" class="text-center">{{ trans('common.name') }}</th>
									<th width="40%" class="text-center">{{ trans('common.description') }}</th>
									<th width="25%" class="text-center">{{ trans('common.action') }}</th>
                				</tr>                				
							</tfoot>
						</table>
					</div>
				</div>
				<div class="card-footer">
					<div class="btn-group col-md-2" role="group">
						<a href="javascript:;" id="reset-table" class="btn btn-default">
							<i class="fa-solid fa-window-restore"></i>&nbsp;{{ trans('common.reset') }}
						</a>
					</div>
					<div class="btn-group col-md-2" role="group">
						<a href="{{ route('role.create') }}" class="btn btn-primary">
							<i class="fa-solid fa-square-plus"></i>&nbsp;{{ trans('common.role_new')}}
						</a>
					</div>
				</div>
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
		    $('#methodTable tfoot th').each( function (index ) {
			    if(index != 3)
			    {
		        	var title = $(this).text();
		        	$(this).html( '<input type="text" placeholder="Search '+title+'" style="width: 100%" />' );
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
      		    "searching": false,
      			"ordering": true,
      			"info": true,
				"lengthChange": false, 
				"pageLength": 10,
				"autoWidth": false,
                "stateSave": true,		    } );

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
		} );
	</script>
@endsection