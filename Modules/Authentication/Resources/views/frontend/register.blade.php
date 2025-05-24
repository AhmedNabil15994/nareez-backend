@extends('apps::frontend.layouts.app')
@section('title', __('authentication::frontend.register.index.title') )
@section('content')
<div class="inner-page grey-bg">
  <div class="container">
    <div class="login-page">

      <div class="row white-bg align-items-center d-flex">
        <div class="col-md-7">
          <div class="login-content">
            <div class="login-head d-flex align-items-center justify-content-between">
              <a class="login-logo" href="{{ route('frontend.home')}}"><img class="img-fluid" src="{{ asset(setting('logo')) }}" alt=""></a>
              <a class="btn btn main-custom-btn" href="{{ route('frontend.auth.login') }}">
                {{ __('Sign In') }}</a>
            </div>
            <div class="login-title">
              <h2>{{ __('Sign Up') }}</h2>
              <p class="text-muted">{{ __('Join Our Community') }} </p>
            </div>
            {!! Form::open([
            'url'=> route('frontend.auth.register.post'),
            'method'=>'POST',
            'class'=>'login-form active',
            'files' => true
            ])!!}
            <h6>
              {{ __('this name will appear in your certification if you finish course') }}
            </h6>
            {!! field('frontend')->text('name',__('name'))!!}
            <div class="my-4" dir="ltr">

              {!! field('frontend')->text('mobile',__('mobile') )!!}
              <input type="hidden" name="country_code" id="country_code" value="{{ old('country_code','kw') }}">

            </div>
            {!! field('frontend')->email('email',__('email') )!!}
            {!! field('frontend')->password('password',__('Password *'))!!}
            {!! field('frontend')->password('password_confirmation',__('Confirm Password *'))!!}
            {!!field('frontend')->select('extra[country_id]',__('Country'),$countries,null,
            [ "data-select2-id"=>"1", "tabindex"=>"-1", "aria-hidden"=>"true",])
            !!}

            <button class="btn btn main-custom-btn btn-block" type="submit"><span> {{ __('Sign Up') }}</span></button>
            {!! Form::close() !!}
          </div>
        </div>
        <div class="col-md-5 login-img">
          <div class="img-box">
            <img class="img-fluid img-animate" src="{{ asset(setting('logo')) }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@push('scripts')
  <script>
    $(function(){
      $('#mobile').attr('name','mobileName')
    })
  </script>
@endpush
