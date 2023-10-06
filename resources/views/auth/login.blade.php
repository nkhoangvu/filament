
@extends('layouts.login')
@section('pageTitle') {{ trans('common.login') }} @endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <img src="/assets/img/logo_main.png" alt="TỘc Nguyễn Khoa">
    </div>
    <!-- Content -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"><strong>{{ trans('common.login') }}</h3>
        </div>
            <!-- Content begin -->
        <div class="card-body">
            <x-message />
            <div class="form-group row">
                <label class="control-label col-md-12" for="name">{{ trans('common.email')}} / {{ trans('common.username')}}</label>
                <div class="col-md-12">
                    <input type="text" placeholder="Email" id="email" class="form-control" name="username" required autofocus>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-5" for="name">{{ trans('common.password') }}</label>
                <div class="col-md-12">
                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                     @endif
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label" for="flexCheckDefault">{{ trans('common.remember') }} </label>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-group">
                <button class="btn btn-warning" type="submit"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;{{ trans('common.login')}}</button>
            </div>
            <div class="form-group row">
				<a class="btn btn-link" href="{{ route('password.request') }}">{{ trans('common.forgot_pass') }}</a>
			</div>
        </div>
    </form>    
</div>
    
@endsection