@extends('layouts.frontend.default')

@section('pageTitle', trans('common.search'))

@section('content')

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">
	  
			<div class="d-flex justify-content-between align-items-center">
				<h2>@yield('pageTitle')</h2>
				<ol>
					<li><a href="/"><i class="fa-solid fa-house nav-icon"></i>{{trans('common.home')}}</a></li>
				  	<li>@yield('pageTitle')</li>
				</ol>
			</div>
	  
		</div>
	</section>
	<!-- End Breadcrumbs -->

	<section id="blog" class="blog">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-8 entries">
					<div class="row mb-3">
						<p>Tìm [{{$search}}] trong tất cả <strong>Bài viết.</strong></p>
						<h3>{{trans('common.search_result')}}: {{$count}}</h3>
					</div>					
					<div class="row">
						<x-frontend.article :data="$results"/>
					</div>
					<div class="blog-pagination">
						{!! $results->links() !!}	
					</div>
				</div>

				<div class="col-lg-4">
					<x-frontend.sidebar :tags="$tags" :recents="$recents" :categories="$categories" />
				</div>
			</div>
		</div>
	</section>

   
@endsection

@section('script')


@endsection