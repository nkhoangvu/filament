@extends('layouts.frontend.default')
@section('pageTitle', 'SNS')

@includeif('components.posts.navbar1')
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
	<div class="container-fluid">

	  <div class="d-flex justify-content-between align-items-center">
		<h2 class="text-stroke all-cap">@yield('pageTitle')</h2>
		<ol>
		  <li><a href="/">{{ trans('common.home') }}</a></li>
		  <li>@yield('pageTitle')</li>
		</ol>
	  </div>

	</div>
</section>
<!-- End Breadcrumbs -->
<section class="content">
	<div class="container-fluid">
        <div class="row">
            <div class="container row col-3 fw-medium mt-4">
                <div class="col sticky-left" >
                    <div class="row ms-1"> 
                        <a href="/profile/{{ auth()->user()->id }}"> 
                            @if(isset(auth()->user()->profile_pic))
                            <img class="profile-user-img img-fluid rounded-circle" src="{{ asset('images/avatar'.auth()->user()->profile_pic) }}"  alt="Avatar" class="post-avatar">    
                            @else
                            <img class="profile-user-img img-fluid"  src="/storage/chandung/no_pic.png" alt="Avatar" class="post-avatar">    
                            @endif
                            <br />
                            {{ auth()->user()->name }}
                        </a> 
                    </div>
                    <hr>
                    <div class="row ms-1">
                        <div class="col-1">
                            <a href="/profile/{{ auth()->user()->id }}"> 
                            <img src="{{ asset('images/ahaahaha.jpg') }}" alt="Avatar" class="post-avatar"></a> 
                        </div> 
                        <div class="col-9 ms-4 mt-1">
                            <a href="/"> Ambatukam Fan Group </a>
                        </div> 
                    </div>
                    <div class="row ms-1">
                        <div class="col-1">
                            <a href="/profile/{{ auth()->user()->id }}"> 
                            <img src="{{ asset('images/it.png') }}" alt="Avatar" class="post-avatar"></a> 
                        </div> 
                        <div class="col-8 ms-4 mt-1">
                            <a href="/"> BSIT 2022-2023 </a>
                        </div> 
                    </div>
                    <div class="row ms-1">
                        <div class="col-1">
                            <i class="bi bi-people"></i>  
                        </div> 
                        <div class="col-8 ms-4">
                            <a href="/"> See all groups </a>
                        </div> 
                    </div>
                </div>
            </div>
                
            <div class="container col-6" >
                @include('frontend.posts.index')
            </div>
            
            <div class="container row col-3 fw-medium mt-4" >
                <div class="col sticky-left">
                    <div class="row ms-1"> 
                        <h6>Contacts</h6>
                    </div>
                    <div class="row ms-1">
                        <div class="col-1">
                            <a href="/profile/{{ auth()->user()->id }}"> 
                            <img src="{{ asset('images/ahaahaha.jpg') }}" alt="Avatar" class="post-avatar"></a> 
                        </div> 
                        <div class="col-9 ms-4 mt-1">
                            <a href="/"> Dreamy Bull XXx </a>
                        </div>
                    </div>
                    @foreach($users as $user) 
                        <x-posts.contact-user-card :user="$user" />
                    @endforeach
                </div>
            </div>  
        </div>
    </div>
</section>

@endsection

@section('script')
	
	@include('frontend.scripts.post')

@endsection