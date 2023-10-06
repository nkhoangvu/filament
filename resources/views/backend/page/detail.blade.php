
@extends('layouts.backend.default')
@section('pageTitle') {{ trans('common.page_detail')}} @endsection
@section('page_sb', 'active')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>{{ trans('ngkhoa.page') }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('common.dashboard') }}</a></li>
					<li class="breadcrumb-item"><a href="{{ route('page.index') }}">{{ trans('ngkhoa.page')}}</a></li>
					<li class="breadcrumb-item active">{{ trans('ngkhoa.page_edit')}}</li>
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
				  		<h3 class="card-title">{{ trans('common.page_info')}}</h3>
						  <div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
    				<div class="card-body">
						<div class="row">
							<div class="form-group col-md-12">
								<div id="editor" class="form-group">
									<table id="mainTable" class="table wrap-list-est table-bordered table-striped"  cellspacing="0" width="100%">
										<thead>
											<tr>
												<th width="10%" class="text-center">{{ trans('common.slug') }}</th> 
												<th width="25%" class="text-center">{{ trans('common.title') }}</th>
												<th width="55%" class="text-center">{{ trans('common.intro') }}</th>
												<th width="10%" class="text-center">{{ trans('common.action') }}</th>
											</tr>
										</thead>
									 	<tbody>	
											<tr>
												<td width="10%" class="text-center">{{ $data->slug }} </td>
											 	<td width="25%" class="text-center">{{ $data->title }}</td>
											 	<td width="55%" class="text-left">{{ $data->intro }}</td>
												<td width="10%" class="text-center">
													<a class="btn btn-sm btn-primary" href="{{ route('page.edit', ['id'=>$data->id]) }}" title="{{ trans('common.edit') }}">
														<i class="fa-solid fa-pen-to-square"></i> 
													</a>												
												</td>
											</tr>
										</tbody>
								 	</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-success">
					<div class="card-header">
				  		<h3 class="card-title">{{ trans('ngkhoa.paragraph')}}</h3>
						  <div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
    				<div class="card-body">
						<div class="row">
							<div class="form-group col-md-12">
								<div id="editor" class="form-group">
									<table id="mainTable" class="table wrap-list-est table-bordered table-striped"  cellspacing="0" width="100%">
										<thead>
											<tr>
												<th width="10%" class="text-center">{{ trans('common.dis_order') }}</th> 
												<th width="75%" class="text-center">{{ trans('common.title') }}</th>
												<th width="15%" class="text-center">{{ trans('common.action') }}</th>
											</tr>
										</thead>
									 <tbody>
											@foreach ($para as $item)
											<tr>
												<td width="10%" class="text-center">{{ $item->dis_order }} </td>
											 	<td width="75%" class="text-center">{{ $item->title}}</td>
											 	<td width="15%" class="text-center">
													 <a class="btn btn-sm btn-primary" id="edit-{{$item->id}}" href="{{ route('paragraph.edit', ['id'=>$item->id]) }}" title="{{ trans('common.edit')}}">
														 <i class="fa-solid fa-pen-to-square"></i>
												 	</a>
												 	<a class="btn btn-sm btn-danger" id="delete-{{$item->id}}" onclick="return confirm('{{ trans('common.action_confirm')}}');" href="{{ route('paragraph.delete', ['id'=>$item->id]) }}" title="{{ trans('common.delete')}}">
														 <i class="fa-solid fa-trash-can"></i>
												 	</a>
											 	</td>
											</tr>
											@endforeach
										</tbody>
								 	</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer" >
					<div class="row" >
						<div class="btn-group col-md-2" role="group">
							<a class="btn btn-primary" href="{{ route('paragraph.create', [$data->id]) }}"><i class="fa-solid fa-circle-plus nav-icon"></i>{{ trans('common.create')}}</a>
						</div>
						<div class="btn-group col-md-2" role="group">
							<a class="btn btn-default" href="{{ route('page.index') }}"><i class="fa-solid fa-ban nav-icon"></i>{{ trans('common.cancel')}}</a>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	$(function () {
		$("#mainForm").validate({
			rules: {
				title: {
					required: true,
				},
				content: {
					required: true,
				},
			},
		messages: {
			name: {
				required: "{{ trans('common.input_required') }}",
				},
			location: {
				required: "{{ trans('common.input_required') }}",
				},
			},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
			},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
			}
		});
	
		$('.custom-file input').change(function (e) {
		var files = [];
		for (var i = 0; i < $(this)[0].files.length; i++) {
				files.push($(this)[0].files[i].name);
			}
			$(this).next('.custom-file-label').html(files.join(', '));
		});
	});

</script>

@endsection