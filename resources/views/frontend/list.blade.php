@extends('layouts.frontend.giapha')

@section('pageTitle', $pageTitle)

@section('content')

	<!-- ======= Breadcrumbs ======= -->
	<div class="container-fluid">
		<div class="d-flex justify-content-between align-items-center">
		<h2 class="text-stroke all-cap">@yield('pageTitle')</h2>
		<ol>
			<li><a href="index.html">{{trans('common.home')}}</a></li>
			<li><a href="index.html">{{trans('ngkhoa.giapha')}}</a></li>
			<li>@yield('pageTitle')</li>
		</ol>
		</div>

	</div>
	</section>
	<!-- End Breadcrumbs -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid" data-aos="fade-up">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">{{ trans('ngkhoa.nguoi_ds') }}</h3>
						</div>
						<div class="card-body">
							<table id="mainTable" class="table wrap-list-est table-bordered table-striped" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th width="15%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
										<th width="5%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
										<th width="10%" class="text-center">{{ trans('ngkhoa.doi') }}</th>
										<th width="10%" class="text-center">{{ trans('ngkhoa.nhanh') }}</th> 
										<th width="30%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th> 
										<th width="15%" class="text-center">{{ trans('ngkhoa.tinhtrang') }}</th> 
									</tr>
								</thead>
								<tbody>
									@foreach ($data->groupBy('MaDoi') as $Doi)
										<tr>
											<td width="15%"class="text-center"><strong>{{ trans('ngkhoa.doi') }}&nbsp;{{ $Doi[0]['MaDoi'] }}</strong></td>
											<td width="5%" class="text-center">&nbsp;</td>
											<td width="10%" class="text-center">&nbsp;</td>
											<td width="10%" class="text-center">&nbsp;</td>
											<td width="30%" class="text-center">&nbsp;</td>
											<td width="15%" class="text-center">&nbsp;</td> 
										</tr>
										@foreach ($Doi as $item)
											<tr>
												<td width="15%"class="text-center"><a href="{{ route('nguoi.view', ['id'=>$item->MaNguoi]) }}"><x-giapha.ten :data="$item" /></td>
												<td width="5%" class="text-center">	<x-giapha.gioitinh :data="$item" /></td>
												<td width="10%" class="text-center">{{ trans('ngkhoa.doi') }}&nbsp;{{$item->MaDoi}}</td>
												<td width="10%" class="text-center">{{ trans('ngkhoa.nhanh') }}&nbsp;{{$item->MaNhanh}}</td>
												<td width="30%" class="text-center">{{$item->NgaySinhAL}}</td>
												<td width="15%" class="text-center">&nbsp;</td> 
												</tr>
										@endforeach
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th width="15%" class="text-center">{{ trans('ngkhoa.hoten') }}</th>
										<th width="5%" class="text-center">{{ trans('ngkhoa.gioitinh') }}</th>
										<th width="10%" class="text-center">{{ trans('ngkhoa.doi') }}</th>
										<th width="10%" class="text-center">{{ trans('ngkhoa.nhanh') }}</th> 
										<th width="30%" class="text-center">{{ trans('ngkhoa.ngaysinh_al') }}</th> 
										<th width="15%" class="text-center">{{ trans('ngkhoa.tinhtrang') }}</th> 
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="btn-group col-md-2" role="group">
					<a href="javascript:;" id="reset-table" class="btn btn-default">
						<i class="fa-solid fa-window-restore"></i>&nbsp;{{ trans('common.reset') }}
					</a>
				</div>
			</div>
		</div>
	</section>

   
@endsection

@section('script')

<script type="text/javascript">
	$(document).ready(function() {
		// Setup - add a text input to each footer cell
		$('#mainTable tfoot th').each( function (index ) {
			if(index != 7)
				{
					var title = $(this).text();
					$(this).html( '<input type="text" placeholder="{{ trans('common.filter') }} - '+title+'" style="width: 100%"/>' );
				}
		});
				
		var table = $('#mainTable').DataTable({
			"responsive": true, 
			"paging": true,
			"searching": true,
			"ordering": false,
			"info": true,
			"lengthChange": true, 
			"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
			"autoWidth": false,
			"stateSave": true,
		});

		// Apply the search
		table.columns().every( function () {
			var that = this;
			
			$('input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			});
		});

		$("#reset-table").click(function(){
			table.state.clear();
			window.location.reload();
		});			
	});
		
</script>

@endsection