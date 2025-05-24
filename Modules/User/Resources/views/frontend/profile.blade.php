@extends('apps::frontend.layouts.app')
@section('title', auth()->user()->name )
@section('content')


{{-- @dd(auth()->user()->getMembership()) --}}
<div class="inner-page grey-bg">
  <div class="container">
    <div class="bg-white edit-section">
      @include('about::frontend.layouts.components._msg')
      <h1 class="inner-title theme-color"> {{ __('Edit My Information') }} </h1>
      <h2 class="inner-title theme-color ">
        @lang('Your Membership') : {!! auth()->user()->nameWithMembership() !!}
      </h2>



      {!! Form::open([
      'method' => 'POST',
      'files' => true,
      'url' => url(route('frontend.profile.update')),
      ]) !!}

      <div class="row">
        <div class="col-md-6">
          {!! field('frontend')->text('name', __('name') , auth()->user()->name)!!}
        </div>
        <div class="col-md-6">
          {!! field('frontend')->file('image', __('image') ,
          auth()->user()->image?asset(auth()->user()->image):null)!!}
        </div>
        <div class="col-md-6">
          {!! field('frontend')->email('email', __('email') , auth()->user()->email)!!}
        </div>


        <div class="col-md-6" dir="ltr">
          {!! field('frontend')->text('mobile', __('mobile') ,auth()->user()->mobile )!!}
          <input type="hidden" name="country_code" id="country_code" value="kw">
        </div>

        <div class="col-md-6">
          {!!
          field('frontend')->select('extra[country_id]',__('Country'),$countries,auth()->user()->extra->country_id,
          ["data-select2-id"=>"1", "tabindex"=>"-1", "aria-hidden"=>"true"]) !!}
        </div>
      </div>
      <div class="d-flex justify-content-end">
        <button class="btn btn main-custom-btn">{{ __('Save changes') }}</button>
      </div>

      {!! Form::close() !!}
    </div>
    <div class="bg-white edit-section">
      <h1 class="inner-title theme-color"> {{ __('Change Password') }} </h1>
      {!! Form::open([
      'method' => 'POST',
      'id' => 'form',
      'url' => url(route('frontend.profile.password')),
      ]) !!}
      <div class="row">
        <div class="col-md-6">
          {!! field('frontend')->password('current_password', __('Current Password'))!!}
        </div>
        <div class="col-md-6">
          {!! field('frontend')->password('password', __('New Password'))!!}
        </div>

        <div class="col-md-6">
          {!! field('frontend')->password('password_confirmation', __('Confirm Password'))!!}
        </div>
      </div>
      <div class="d-flex justify-content-end">
        <button class="btn btn main-custom-btn">{{ __('Change Password') }}</button>
      </div>
      {!! Form::close() !!}
      <div class="d-flex justify-content-start">
        <a href="{{ route('frontend.auth.logout') }}" class="btn main-custom-btn">
          {{ __('user::frontend.show.logout') }}
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
@push('styles')
<style>
  .hide {
    display: none
  }

</style>
@endpush
