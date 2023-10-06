@extends('layouts.backend.default')

@section('pageTitle', trans('common.trash'))
@section('trash_sb', 'active')
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
					<li class="breadcrumb-item active">@yield('pageTitle')</li>
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
		@if(count($baiviet) > 0)
		<x-backend.trash :data="$baiviet" model="baiviet" :title="trans('common.article')" />
		@endif
		@if(count($trang) > 0)
		<x-backend.trash :data="$trang" model="page" :title="trans('common.page')" />
		@endif
		@if(count($nguoi) > 0)
		<x-backend.trash :data="$nguoi" model="nguoi" :title="trans('common.nguoi')" />
		@endif
	</div>
</section>
@endsection

@section('script')

	@include('scripts.backend.datatables')
	<script type="text/javascript">
		$(document).ready(function() {
			// Setup - add a text input to each footer cell
		    $('#baiviet tfoot th').each( function (index ) {
			    if(index != 2)
			    {
		        	var title = $(this).text();
		        	$(this).html( '<input type="text" placeholder="Search '+title+'"  style="width: 100%" />' );
			    }
		    } );
			
			var table = $('#baiviet').DataTable({
                "bAutoWidth": false,
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                stateSave: false,
		    });

			$('#page tfoot th').each( function (index ) {
			    if(index != 2)
			    {
		        	var title = $(this).text();
		        	$(this).html( '<input type="text" placeholder="Search '+title+'"  style="width: 100%" />' );
			    }
		    } );
			
			var table = $('#page').DataTable({
                "bAutoWidth": false,
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                stateSave: false,
		    });

			$('#nguoi tfoot th').each( function (index ) {
			    if(index != 2)
			    {
		        	var title = $(this).text();
		        	$(this).html( '<input type="text" placeholder="Search '+title+'"  style="width: 100%" />' );
			    }
		    } );
			
			var table = $('#nguoi').DataTable({
                "bAutoWidth": false,
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                stateSave: false,
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
		        } );
		    } );
		});
	</script>

@endsection
