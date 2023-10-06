
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.sys_log') }} @endsection
@section('log_sb', 'active')
    

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('common.sys_log') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">{{ trans('common.home') }}</a></li>
					<li class="breadcrumb-item active">{{ trans('common.sys_log') }}</li>
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
				  <h3 class="card-title">{{ trans('common.logs') }}</h3>
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
				<table border="0" cellspacing="5" cellpadding="5">
					<tr>
						<td><strong>{{ trans('common.date') }}:</strong></td>
						<td><input type="text" id="min" name="min" placeholder="YYYY-mm-dd"></td>
						<td>{{ trans('common.from') }}</td>
						<td><input type="text" id="max" name="max" placeholder="YYYY-mm-dd"></td>
						<td>{{ trans('common.to') }}</td>
					</tr>
				</table>
				<table id="logTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
                	<thead>
                		<tr>
							<th width="20%">{{ trans('common.date') }}</th>
							<th width="10%">{{ trans('common.log_type') }}</th>
							<th width="30%">{{ trans('common.log_description') }}</th>
							<th width="25%">{{ trans('common.done_by') }}</th>
							<th width="15%">{{ trans('common.action') }}</th>
                		</tr>
                	</thead>
                    <tbody>
                	   	@foreach ($data as $item)
                		<tr>
							<td width="20%" class="text-center">{{ $item->created_at }}</td>
							<td width="10%" class="text-center">{{ $item->log_name }}</td>
							<td width="30%" class="text-center1"><i>{{$item->description}}</i></td>
							<td width="25%" class="text-center">{{ $item->done_by }}</td>
							<td width="15%" class="text-center">
								@if(isset($item->subject_id)) 
								<a class="btn btn-sm btn-primary" href="{{ route('log.show', ['id'=>$item->id]) }}">
									<i class="fa-solid fa-pen-to-square"></i> {{ trans('common.detail') }}
								</a>	
								@endif
							</td>
                		</tr>
                		@endforeach
                	</tbody>
                	<tfoot>
						<tr>
							<th width="20%">{{ trans('common.log_date') }}</th>
							<th width="10%">{{ trans('common.log_type') }}</th>
							<th width="30%">{{ trans('common.log_description') }}</th>
							<th width="25%">{{ trans('common.done_by') }}</th>
							<th width="15%">{{ trans('common.action') }}</th>
						</tr>
    				</tfoot>
                </table>
			</div>
		</div>
	</div>
</section>				
<div class="card-footer">
	<div class="btn-group col-md-2" role="group">
		<a href="javascript:;" id="reset-table" class="btn btn-default">
			<i class="fa-solid fa-window-restore"></i>&nbsp;{{ trans('common.reset') }}
		</a>
	</div>
</div>

@endsection

@section('script')
	@include('scripts.backend.datatables') 
	<script type="text/javascript">
		$(document).ready(function() {
			// Setup - add a text input to each footer cell
		    $('#logTable tfoot th').each( function (index ) {
			    if(index != 5)
			    {
		        	var title = $(this).text();
		        	$(this).html( '<input type="text" placeholder="{{ trans('common.filter') }} - '+title+'" style="width: 100%"/>' );
			    }
		    } );
			
			var table = $('#logTable').DataTable({
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
				"order": [[0, 'desc']],
      			"info": true,
				"lengthChange": false, 
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
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
			var minDate, maxDate;
 
 			// Custom filtering function which will search data in column four between two values
 			$.fn.dataTable.ext.search.push(
 			function( settings, data, dataIndex ) {
	 			var min = minDate.val();
	 			var max = maxDate.val();
	 			var date = new Date( data[0] );

	 			if (
		 			( min === null && max === null ) ||
		 			( min === null && date <= max ) ||
		 			( min <= date   && max === null ) ||
		 			( min <= date   && date <= max )
	 			) {
		 		return true;
	 			}
	 			return false;
 			});

			$(document).ready(function() {
 				// Create date inputs
 				minDate = new DateTime($('#min'), {
	 				format: 'YYYY-MM-DD'
 				});
 				maxDate = new DateTime($('#max'), {
	 				format: 'YYYY-MM-DD'
	 			});

 				// DataTables initialisation
	 			var table = $('#logTable').DataTable();

 				// Refilter the table
 				$('#min, #max').on('change', function () {
	 				table.draw();
	 			});

			});
		});

	</script>
@endsection