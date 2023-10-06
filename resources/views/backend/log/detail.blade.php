
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('log') }} @endsection
@section('log_sb', 'active')

@php
	$true = 'Yes';
	$false = 'No';
	$na = 'n/a';
@endphp
@php
    

@endphp
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('common.log') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/log">{{ trans('common.log')}}</a></li>
					<li class="breadcrumb-item active">{{ trans('common.log_detail')}}</li>
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
<!-- Content -->
<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">{{ trans('common.log_detail') }}</h3>
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
						<label class="control-label col-md-3" for="name">{{ trans('common.date')}}</span></label>
						<div class="col-md-9">
							<input type="text" value="{{ $data->created_at }}" class="form-control" name="displayname" disabled/>
						</div>
					</div>
					<div class="form-group col">
						<label class="control-label col-md-3" for="name">{{ trans('common.done_by')}}</span></label>
						<div class="col-md-9">
							<input type="text" value="{{ $data->done_by }}" class="form-control" name="displayname" disabled/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label class="control-label col-md-3" for="name">{{ trans('common.log_type')}}</span></label>
						<div class="col-md-9">
							<input type="text" value="{{ $data->log_name }}" class="form-control" name="displayname" disabled/>
						</div>
					</div>
					<div class="form-group col">
						<label class="control-label col-md-3" for="name">{{ trans('common.description')}}</span></label>
						<div class="col-md-9">
							<input type="text" value="{{ $data->description }}" class="form-control" name="displayname" disabled/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label class="control-label col-md-3" for="name">{{ trans('common.log_subject')}}</span></label>
						<div class="col-md-9">
							<input type="text" value="{{ $data->subject_type }}" class="form-control" name="displayname" disabled/>
						</div>
					</div>
					<div class="form-group col">
						<label class="control-label col-md-3" for="name">{{ trans('common.subject_id')}}</span></label>
						<div class="col-md-9">
							<input type="text" value="{{ $data->subject_id }}" class="form-control" name="displayname" disabled/>
						</div>
					</div>
				</div>
				<table id="logTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                			<th width="50%" class="text-center">{{ trans('common.before') }}</th> 
                            <th width="50%" class="text-center">{{ trans('common.after') }}</th>
                		</tr>
                	</thead>
                    <tbody>
                		<tr>						
							<td width="50%" class="text-center">{{ json_encode($old) }}</td>
							<td width="50%" class="text-center">{{ json_encode($changes) }}</td>
                		</tr>
                	</tbody>
				</table>
			</div>
		</div>
	</div>
</section>				
<div class="card-footer">
	<div class="btn-group col-md-2" role="group">
		<a class="btn btn-default" href="{{ route('log') }}">{{ trans('common.back') }}</a>
	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
		var height_table = 640;
		$(document).ready(function() {
			// Setup - add a text input to each footer cell
		    $('#paymentTable tfoot th').each( function (index ) {
			    if(index != 5)
			    {
		        	var title = $(this).text();
		        	$(this).html( '<input type="text" placeholder="{{ trans('common.filter') }} - '+title+'" style="width: 100%"/>' );
			    }
		    } );
			
			var table = $('#paymentTable').DataTable({
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

		    $("#reset-table").click(function(){
		    	table.state.clear();
		    	window.location.reload();
			});
		} );
	</script>
@endsection