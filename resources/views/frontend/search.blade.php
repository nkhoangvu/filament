@extends('layouts.frontend.default')


@section('content')
                <br /><br /><br /><br />
               <div class="col-md-6" data-aos="fade-up">
                <form id="searchForm" class="form-horizontal" action="{{ route('search.all') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input class="form-control d-flex align-items-stretch" type="search" placeholder="{{ trans('common.search_home') }}" aria-label="Search" name="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>&nbsp;{{ trans('common.search') }}</button>
                        </div>
                    </div>
                </form>
            </div>
   

@endsection

@section('script')
    
   

@endsection