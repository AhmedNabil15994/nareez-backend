@extends('apps::frontend.layouts.app')
@section('title', __('Contact Us'))
@section('content')
<section class="page-head align-items-center text-center d-flex">
    <div class="container">
        <h1>{{ __('Contact Us') }}</h1>
    </div>
</section>
<div class="inner-page grey-bg">
    <div class="container">
        <div class="row contact-section">
            <div class="col-md-6">
                <h1 class="inner-title theme-color"> {{ __('Contact us') }} </h1>
                <ul class="contact-info">
                    <li><i class="fas fa-phone-volume"></i> {{ setting('contact_us','call_number') }}</li>
                    <li><i class="fas fa-envelope-open-text"></i> {{ setting('contact_us','email') }}</li>
                </ul>
                <div class="direct-msg">
                    <a class="btn"
                        href="https://wa.me/{{ setting('social','Whatsapp') }}"><i class="fab fa-whatsapp"></i> {{
                        __('Direct Support') }}</a>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="inner-title theme-color">{{ __('Send Message') }} </h1>
                {!! Form::open([
                'url'=> route('frontend.contactus'),
                'id'=>'form',
                'role'=>'form',
                'method'=>'POST',
                'class'=>'form-contact',
                'files' => true
                ])!!}
                <div class="row">
                    <div class="col-md-6">
                        {!! field('frontend')->text('username',__('name')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! field('frontend')->email('email',__('Email')) !!}
                    </div>
                    <div class="col-md-12">
                        {!! field('frontend')->ckEditor5('message' ,__('Message')) !!}
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn main-custom-btn"
                        type="submit"><span> {{ __('Send') }}</span></button>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
        {{-- <section id="google-maps">
            <div class="google-map">
                <div class="gmap3-area"
                    data-lat="40.712776"
                    data-lng="-74.005974"
                    data-mrkr="{{ asset('frontend/images/map-marker.png') }}"></div>
            </div>
        </section> --}}
    </div>
</div>

@endsection
