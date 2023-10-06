@extends('layouts.frontend.default')

@section($current, 'active')
	
@section('content')
	
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="text-stroke all-cap">{{ $category }}</h2>
          <ol>
            <li><a href="/">{{ trans('common.home') }}</a></li>
            <li><a href="#">{{ $category }}</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-9 entries">
            @if(count($page) == 0)
            <article class="entry">
              <h3 class="text-danger">{{trans('common.no_data')}}</h3>
            </article>
            @else
			      <x-frontend.article :data="$page"/>
			                
            <div class="blog-pagination">
                {{ $page->links() }}
            </div>
            @endif
          </div>
          <!-- End blog entries list -->

          <div class="col-lg-3">
            <x-frontend.sidebar :tags="$tags" :recents="$recents" :categories="$categories" />
          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main>

@endsection

@section('script')

  
@endsection