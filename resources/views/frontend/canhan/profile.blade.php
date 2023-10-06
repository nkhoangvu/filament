
@extends('layouts.frontend.default')
@section('pageTitle') {{ trans('common.profile')}} @endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
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

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Notification -->
		<x-message />
		<!-- Content -->
		<div class="row">
			<div class="col-md-3">
				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" src="/uploads/images/no_pic.png" alt="User profile picture">
						</div>

						<h3 class="profile-username text-center">{{$data->name}}</h3>
						@if(isset($data->employee->position))
						<p class="text-muted text-center"><strong>{{ $data->employee->position }}</strong></p>
						@endif
						<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
							<b>{{trans('ad.department')}}</b> <a class="float-right">1</a>
						</li>
						<li class="list-group-item">
							<b>{{trans('ad.branch')}}</b> <a class="float-right">2</a>
						</li>
						<li class="list-group-item">
							<b>{{trans('ad.company')}}</b> <a class="float-right">3</a>
						</li>
						</ul>
					</div>
						<!-- /.card-body -->
				</div>
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Account</h3>
					</div><!-- /.card-header -->
					<div class="card-body">
						<strong><i class="nav-icon fa-solid fa-user mr-1"></i>{{trans('common.username')}}</strong>

						<p class="text-muted">{{$data->username}}</p>                    
						
						<hr>
						<strong><i class="nav-icon fa-solid fa-at mr-1"></i>{{trans('common.email')}}</strong>

						<p class="text-muted">{{$data->email}}</p>

						<hr>
						<strong><i class="nav-icon fa-solid fa-lock mr-1"></i>{{trans('common.role')}}</strong>

                        
						<p class="text-muted">{{ Auth::user()->roles->pluck('display_name')->first() }}</p>

            <hr>

            <strong><i class="nav-icon fa-solid fa-file-alt mr-1"></i> {{trans('ad.remark')}}</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
					</div><!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<div class="col-md-6">
				
        <div class="card">
          <div class="card-body">
          <!-- Data -->
          <div class="d-flex mb-3">
            <div class="row">
              <a href="">
              <img src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
              </a>
            </div>
            <div>
            <a href="" class="text-dark mb-0">
              <strong>Anna Doe</strong>
            </a>
            <a href="" class="text-muted d-block" style="margin-top: -6px">
              <small>10h</small>
            </a>
            </div>
          </div>
          <!-- Description -->
          <div>
            <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing
            elit. Atque ex non impedit corporis sunt nisi nam fuga
            dolor est, saepe vitae delectus fugit, accusantium qui
            nulla aut adipisci provident praesentium?
            </p>
          </div>
          </div>
          <!-- Media -->
          <div class="bg-image p-3 hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
          <img src="https://mdbcdn.b-cdn.net/img/new/standard/people/077.webp" class="w-100" />
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
          </a>
          </div>
          <!-- Media -->
          <!-- Interactions -->
          <div class="card-body">
          <!-- Reactions -->
          <div class="d-flex justify-content-between mb-3">
            <div>
            <a href="">
              <i class="fas fa-thumbs-up text-primary"></i>
              <i class="fas fa-heart text-danger"></i>
              <span>124</span>
            </a>
            </div>
            <div>
            <a href="" class="text-muted"> 8 comments </a>
            </div>
          </div>
          <!-- Reactions -->
        
          <!-- Buttons -->
          <div class="d-flex justify-content-between text-center border-top border-bottom mb-4">
            <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
            <i class="fas fa-thumbs-up me-2"></i>Like
            </button>
            <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
            <i class="fas fa-comment-alt me-2"></i>Comment
            </button>
            <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
            <i class="fas fa-share me-2"></i>Share
            </button>
          </div>
          <!-- Buttons -->
        
          <!-- Comments -->
        
          <!-- Input -->
          <div class="d-flex mb-3">
            <a href="">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2"
              alt="Avatar" style="height: 40px" />
            </a>
            <div class="form-outline w-100">
            <textarea class="form-control" id="textAreaExample" rows="2"></textarea>
            <label class="form-label" for="textAreaExample">Write a comment</label>
            </div>
          </div>
          <!-- Input -->
        
          <!-- Answers -->
        
          <!-- Single answer -->
          <div class="d-flex mb-3">
            <a href="">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
              alt="Avatar" style="height: 40px" />
            </a>
            <div>
            <div class="bg-light rounded-3 px-3 py-1">
              <a href="" class="text-dark mb-0">
              <strong>Malcolm Dosh</strong>
              </a>
              <a href="" class="text-muted d-block">
              <small>Lorem ipsum dolor sit amet consectetur,
                adipisicing elit. Natus, aspernatur!</small>
              </a>
            </div>
            <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
            <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
            </div>
          </div>
        
          <!-- Single answer -->
          <div class="d-flex mb-3">
            <a href="">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/5.webp" class="border rounded-circle me-2"
              alt="Avatar" style="height: 40px" />
            </a>
            <div>
            <div class="bg-light rounded-3 px-3 py-1">
              <a href="" class="text-dark mb-0">
              <strong>Rhia Wallis</strong>
              </a>
              <a href="" class="text-muted d-block">
              <small>Et tempora ad natus autem enim a distinctio
                quaerat asperiores necessitatibus commodi dolorum
                nam perferendis labore delectus, aliquid placeat
                quia nisi magnam.</small>
              </a>
            </div>
            <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
            <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
            </div>
          </div>
        
          <!-- Single answer -->
          <div class="d-flex mb-3">
            <a href="">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/6.webp" class="border rounded-circle me-2"
              alt="Avatar" style="height: 40px" />
            </a>
            <div>
            <div class="bg-light rounded-3 px-3 py-1">
              <a href="" class="text-dark mb-0">
              <strong>Marcie Mcgee</strong>
              </a>
              <a href="" class="text-muted d-block">
              <small>
                Officia asperiores autem sit rerum architecto a
                deserunt doloribus obcaecati, velit ab at, ad
                delectus sapiente! Voluptatibus quaerat suscipit
                in nostrum necessitatibus illum nemo quo beatae
                obcaecati quidem optio fugit ipsam distinctio,
                illo repellendus porro sequi alias perferendis ea
                soluta maiores nisi eligendi? Mollitia debitis
                quam ex, voluptates cupiditate magnam
                fugiat.</small>
              </a>
            </div>
            <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
            <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
            </div>
          </div>
        
          <!-- Single answer -->
          <div class="d-flex mb-3">
            <a href="">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/10.webp" class="border rounded-circle me-2"
              alt="Avatar" style="height: 40px" />
            </a>
            <div>
            <div class="bg-light rounded-3 px-3 py-1">
              <a href="" class="text-dark mb-0">
              <strong>Hollie James</strong>
              </a>
              <a href="" class="text-muted d-block">
              <small>Voluptatibus quaerat suscipit in nostrum
                necessitatibus</small>
              </a>
            </div>
            <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
            <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
            </div>
          </div>
        
          <!-- Answers -->
        
          <!-- Comments -->
          </div>
          <!-- Interactions -->
        </div>
				<!-- /.card -->
			</div>
      <div class="col-md-3">
        <div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" src="/uploads/images/no_pic.png" alt="User profile picture">
						</div>

						<h3 class="profile-username text-center">{{$data->name}}</h3>
						@if(isset($data->employee->position))
						<p class="text-muted text-center"><strong>{{ $data->employee->position }}</strong></p>
						@endif
						<ul class="list-group list-group-unbordered mb-3">
						<li class="list-group-item">
							<b>{{trans('ad.department')}}</b> <a class="float-right">1</a>
						</li>
						<li class="list-group-item">
							<b>{{trans('ad.branch')}}</b> <a class="float-right">2</a>
						</li>
						<li class="list-group-item">
							<b>{{trans('ad.company')}}</b> <a class="float-right">3</a>
						</li>
						</ul>
					</div>
      </div>
		</div>
	</div>

</section>
@endsection

@section('script')
	@includeif('scripts.index-3-col')  
@endsection