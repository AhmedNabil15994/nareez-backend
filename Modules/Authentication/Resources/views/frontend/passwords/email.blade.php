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
                            <h2> {{ __('authentication::frontend.reset_password.index.title') }}</h2>
                        </div>

                        @include('apps::frontend.layouts._alerts')
                        {!! Form::open([
                        'url'=> route('frontend.auth.password.email'),
                        'method'=>'POST',
                        'class'=>'login-form',
                        'files' => true
                        ])!!}
                        {!! field('frontend')->email('email',__('authentication::frontend.login.index.email'))!!}
                        <button class="btn btn main-custom-btn btn-block" type="submit"><span>
                                {{ __('authentication::frontend.reset_password.index.title') }}</span>
                        </button>

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
