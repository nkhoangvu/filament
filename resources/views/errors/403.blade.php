@extends('layouts.error')
@section('pageTitle') {{ trans('common.403') }} @endsection

@section('content')
<section class="content">
    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        <div class="mx-auto sm:px-12 lg:px-16">
            <div class="col">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0 justify-content-center">
                    <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider"><strong>403</strong></div>
                    <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-exclamation-triangle text-warning"></i> {{ trans('common.403_error') }}</div>                        
                    </div>
                </div>
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0 justify-content-center">
                    &nbsp;
                </div>                
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0 justify-content-center">
                    <a href="/" class="btn btn-warning"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;{{ trans('common.home')}}</a>
                </div>
            </div>
        </div>
    </div>    
 </section>
@endsection