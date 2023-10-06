@extends('layouts.error')
@section('pageTitle') {{ trans('common.404') }} @endsection

@section('content')

    <!-- Main content -->
    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
      <div class="col">
        <div class="flex items-center pt-8 sm:justify-start sm:pt-0 justify-content-center">
            <h1 class="headline px-4 text-warning border-r border-gray-400"> <strong>419</strong></h1>
            <div class="error-content">
              <h3 class="ml-4"><i class="fas fa-exclamation-triangle text-warning"></i> {{ trans('common.419') }}</h3>
              <p class="ml-4">{{ trans('common.419_error') }}</p>
            </div>
        </div><br />
        <div class="flex items-center pt-8 sm:justify-start sm:pt-0 justify-content-center">
          <div class="items-center justify-content-center">
            <a href="/login" class="btn btn-warning"><i class="fa-solid fa-arrow-right-to-bracket nav-icon"></i>{{ trans('common.login')}}</a>
          </div>
        </div>
      
</section>
