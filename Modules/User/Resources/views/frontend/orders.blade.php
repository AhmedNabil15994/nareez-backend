@extends('apps::frontend.layouts.app')
@section('title', __('user::frontend.show.orders') )
@section('content')
    <section class="page-head align-items-center text-center d-flex">
        <div class="container">
            <h1>{{ __('user::frontend.show.orders') }}</h1>
        </div>
    </section>
    <div class="inner-page grey-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="user-side">
                        @include('user::frontend.layout.aside')
                    </div>
                </div>
                <div class="col-md-10">

                    <div class="account-section bg-white">
                        <h2>{{__('user::frontend.show.orders')}}</h2>
                        <div class="order-list">

                            @foreach($orders as $order)
                                @if
                                    @php $course = $order->orderCourses()->first();@endphp
                                    <div class="order-block d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="img-block overlay-block">
                                                <img src="{{asset(optional($course->course)->image)}}" alt=""/>
                                            </div>
                                            <div>
                                                <h3>
                                                    <a href="{{url(route('frontend.courses.show',optional($course->course)->slug))}}">{{optional($course->course)->title}}</a>
                                                </h3>
                                                <span
                                                  >{{$course->period}} Days - {{$course->total}} K.D</span>
                                            </div>
                                        </div>

                                        <div class="order-status">
                                            @if(optional($order->orderStatus)->success_status)
                                                <span class="done">{{__('user::frontend.show.Done')}}</span>
                                            @elseif(optional($order->orderStatus)->failed_status)
                                                <span class="canceled">{{__('user::frontend.show.Canceled')}}</span>
                                            @else
                                                <span class="in-progress">{{__('user::frontend.show.In Progress')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
