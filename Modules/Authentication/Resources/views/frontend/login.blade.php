@extends('apps::frontend.layouts.app')
@section('title', __('authentication::frontend.login.index.title') )
@section('content')
<div class="inner-page grey-bg">
    <div class="container">
        <div class="login-page">
            <div class="row white-bg align-items-center d-flex">
                <div class="col-md-7">
                    <div class="login-content">
                        <div class="login-head d-flex align-items-center justify-content-between">
                            <a class="login-logo" href="{{ route('frontend.home') }}">
                                <img class="img-fluid" src="{{ setting('logo') }}" alt="">
                            </a>
                            <a class="btn btn main-custom-btn" href="{{ route('frontend.auth.register') }}">
                                {{ __('Register as New Member') }}
                            </a>
                        </div>
                        <div class="login-title">
                            <h2>{{ __('Sign in') }}</h2>
                            <p class="text-muted">{{ __('Welcome Back') }}</p>
                        </div>
                        {!! Form::open([
                        'url'=> route('frontend.auth.login.post'),
                        'method'=>'POST',
                        'class'=>'login-form',
                        'files' => true
                        ])!!}
                        {!! field('frontend')->email('email',__('authentication::frontend.login.index.email'))!!}
                        {!! field('frontend')->password('password',__('authentication::frontend.login.index.password'))!!}
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="remember" name="remember" class="">
                            <label class="" for="remember"> {{ __('authentication::frontend.login.index.remember') }}</label>
                        </div>

                        <button class="btn btn main-custom-btn btn-block" type="submit"><span>
                                {{ __('Sign in') }}</span>
                        </button>
                        <a class="btn btn main-custom-btn my-2" href="{{route('frontend.auth.password.request')}}">
                            {{ __('authentication::frontend.login.index.forget_password') }}
                        </a>
                        {!! Form::close() !!}
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
@stop
