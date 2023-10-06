
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
					<li class="breadcrumb-item"><a href="{{ route('baiviet.index') }}">{{ trans('common.post')}}</a></li>
					<li class="breadcrumb-item active">{{ trans('common.edit')}}</li>
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
		<form class="form-horizontal" id="mainForm" action="{{ route('baiviet.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
			@method('PUT')
			@csrf
				
			<x-backend.baiviet :data="$data" :categories="$categories" :authors="$authors" :tags="$tags"/>

			<x-buttons.footer-submit :route="'baiviet.index'" :label="trans('common.update')"/>
			
		</form>
	</div>
	<x-modals.image :data="$data"/>
</section>
@endsection

@section('script')
	
<script type="text/javascript">
	$(document).ready(function() {      
		$("#subForm").submit(function(event){
			submitForm();
			return false;
		});

		$('.image-box').fancybox();
	});

	function submitForm(){
	var form = document.forms.namedItem("subForm"); // high importance!, "subForm" is the name of your form
	//var formData = new FormData(form); // high importance!

	$.ajax({
		async: true,
		type: "POST",
		url: "{{ route('baiviet.img-add', [$data->id]) }}",
		cache:false,
		processData: false, // high importance!
		contentType: false, // high importance!
		data: new FormData(form), // high importance!
		success: function(response){
			$("#imageModal").modal('hide');
			location.reload();
			},
		error: function(data){
			alert("Error: "+data.responseText);
			}
		});
	}

	$('#imageModal').on('hidden.bs.modal', function () {
		location.reload();
	})
	
	$('.custom-file-input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });
</script>
<link href="/assets/plugins/jquery-fancybox/jquery.fancybox.min.css" rel="stylesheet">
<script src="/assets/plugins/jquery-fancybox/jquery.fancybox.min.js"></script>
@include('scripts.backend.baiviet')

@endsection