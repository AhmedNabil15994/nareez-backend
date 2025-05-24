@extends('apps::frontend.layouts.app')
@section('title', __('authentication::frontend.change_password.index.title') )
@section('content')

<div class="page-content white-bg">
    <div class="container">
        <div class="login-page">
            <div class="row grey-bg align-items-center d-flex">
                <div class="col-md-7">
                    <div class="login-content">
                        <div class="login-head d-flex align-items-center justify-content-between">
                            <a class="login-logo" href="{{ route('frontend.home') }}"><img class="img-fluid" src="/frontend/images/login-3.svg" alt="" /></a>
                            <a class="btn btn main-custom-btn" href="{{ route('frontend.auth.login') }}"><span>
                                    {{ __('authentication::frontend.login.index.title') }}
                                </span></a>
                        </div>
                        <div class="login-title">
                            <h2> {{ __('authentication::frontend.change_password.index.title') }}</h2>
                        </div>
                        <form method="POST" action="{{ route('frontend.password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <input class="form-control" type="email" name="email" readonly value="{{ $request->email }}"
                                placeholder="{{ __('authentication::frontend.login.index.email') }}" />
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input class="form-control" type="password" name="password"
                                placeholder="{{ __('authentication::frontend.register.index.password') }}">
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input class="form-control" type="password" name="password_confirmation"
                                placeholder="{{ __('authentication::frontend.register.index.password_confirmation') }}" />
                            <button type="submit" class="btn btn main-custom-btn btn-block"><span> {{
                                    __('authentication::frontend.change_password.index.title') }} </span></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="img-box">
                        <img class="img-fluid img-animate" src="{{ asset(setting('logo')) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
