@extends('apps::frontend.layouts.app')
@section('title', auth()->user()->name )
@section('content')

<section class="page-head align-items-center text-center d-flex">
    <div class="container">
        <h1>{{ __('user::frontend.show.events') }}</h1>
        <ul class="mt-20">
            <li>
                <a href="{{ url(route('frontend.home')) }}">
                    {{ __('apps::frontend.index.title') }} /
                </a>
            </li>
            <li class="active">{{ __('user::frontend.show.events') }}</li>
        </ul>
    </div>
</section>

<div class="inner-page">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="sidebar-box">
                    @include('user::frontend.layout.aside')
                </div>
            </div>

            <div class="col-md-9 account-content">

                @foreach ($events as $event)
                    <div class="myclass-block media d-flex align-items-center wow fadeInUp mb-30">
                        <div class="media-img">
                            <img class="img-fluid" src="{{ url($event->image) }}" alt="" />
                        </div>
                        <div class="media-body">
                            <h3 class="align-items-center d-flex">
                                <a href="{{ url(route('frontend.events.show',$event->translate('en')->slug)) }}" class="event-title">
                                    {{ $event->title }}
                                </a>
                            </h3>
                            <p class="mb-15">
                                {!! $event->description !!}
                            </p>
                            <div class="my-courses-opt d-flex align-items-center">
                                <a href="{{ url(route('frontend.events.show',$event->translate('en')->slug)) }}" class="btn view-more">{{ __('user::frontend.show.event_details') }}</a>
                                {{-- <div class="rating rating-class" data-toggle="modal" data-target="#rate-class">
                                    Rate this class: <ul>
                                        <li><i class="fa fa-star empty"></i></li>
                                        <li><i class="fa fa-star empty"></i></li>
                                        <li><i class="fa fa-star empty"></i></li>
                                        <li><i class="fa fa-star empty"></i></li>
                                        <li><i class="fa fa-star empty"></i></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop
