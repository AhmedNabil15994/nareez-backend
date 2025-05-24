@extends('apps::frontend.layouts.app')
@section('title', $category->translate(locale())->title)
@section('content')

<section class="page-head custom-head {{color_theme($category)}} align-items-center text-center d-flex">
    <div class="header-slider owl-carousel">
        <div class="item"><img src="/frontend/en/images/header/1.jpg" class="img-fluid" alt=""/></div>
        <div class="item"><img src="/frontend/en/images/header/2.jpg" class="img-fluid" alt="" /></div>
        <div class="item"><img src="/frontend/en/images/header/3.jpg" class="img-fluid" alt="" /></div>
    </div>
    <div class="container">
        <h1>{{ $category->translate(locale())->title }}</h1>
        <ul class="mt-20">
            <li>
                <a href="{{ url(route('frontend.home')) }}">
                    <i class="ti-home"></i> {{ __('apps::frontend.navbar.home') }} /
                </a>
            </li>
            <li>
                <a href="#.">
                    {{ __('category::frontend.index.title') }} /
                </a>
            </li>
            <li class="active">{{ $category->translate(locale())->title }}</li>
        </ul>
    </div>
</section>
<div class="{{color_theme($category)}}-classes classes-page">
    <div class="inner-page">
        <div class="container">
            <div class="class-description mb-60">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-style style-2 mb-30">
                            <h2 class="section-title">
                                {{ __('category::frontend.index.about_event') }}
                                 {{ $category->translate(locale())->title }}
                             </h2>
                            <img class="title-border" src="/frontend/en/images/title-line-{{color_theme($category)}}.png">
                        </div>

                        <div class="show-less-div-4">
                            <p class="mb-15">
                                {!! $category->translate(locale())->description !!}
                            </p>
                        </div>

                    </div>
                    <br>
                    <div class="col-md-6">
                        <div class="img-box text-right">
                            <img class="img-fluid" src="{{ url($category->image) }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>


            @if (count($events) > 0)
                <div class="section-header-style style-2 mb-30">
                    <h2 class="section-title">
                        {{ $category->translate(locale())->title }}
                        {{ __('category::frontend.index.classes') }}
                    </h2>
                    <img class="title-border" src="/frontend/en/images/title-line-{{color_theme($category)}}.png">
                </div>
                <div class="row">
                    @foreach ($events as $event)
                    <div class="col-md-4 wow fadeInUp">
                        <div class="event-block mb-30">
                            <div class="img-block">
                                <img class="img-fluid" src="{{ url($event->image) }}" alt="" />
                                <a class="view-det" href="{{url(route('frontend.events.show',$event->translate('en')->slug))}}">
                                    {{ __('apps::frontend.buttons.view') }}
                                </a>
                            </div>
                            <div class="content-block">
                                <h3>
                                    <a href="{{url(route('frontend.events.show',$event->translate('en')->slug))}}" class="event-title">
                                        {{ $event->translate(locale())->title }}
                                    </a>
                                </h3>
                                <ul class="content-list">
                                    <li><i class="ti-timer"></i> {{ $event->start_time }} - {{ $event->end_time }}</li>
                                    <li><i class="ti-timer"></i> {{ $event->start_date }} - {{ $event->end_date }}</li>
                                    <li><i class="ti-location-pin"></i> {{ $event->address }}</li>
                                </ul>
                                <div class="content-head d-flex align-items-center">
                                    <span class="event-price"> {{ $event->price }} KWD</span>
                                    @if (count($event->subscribed) <= 0)
                                    <a href="{{url(route('frontend.events.ticket',$event->translate('en')->slug))}}" class="event-booking">
                                        {{ __('apps::frontend.buttons.get_ticket') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination-items pag-{{color_theme($category)}} mt-20">
                    <ul class="pagination d-md-flex justify-content-center align-items-md-center">
                        {{ $events->appends(Request::except('page'))->links() }}
                    </ul>
                </div>
            @endif

            @if (count($courses) > 0)

                <div class="section-header-style style-2 mb-30">
                    <h2 class="section-title">
                        {{ $category->translate(locale())->title }}
                        {{ __('category::frontend.index.courses') }}
                    </h2>
                    <img class="title-border" src="/frontend/en/images/title-line-{{color_theme($category)}}.png">
                </div>
                <div class="row">
                    @foreach ($courses as $course)
                    <div class="col-md-4 wow fadeInUp">
                        <div class="event-block class-block">
                            <div class="img-block">
                                <img class="img-fluid" src="{{ url($course->image) }}" alt="" />
                                <ul class="social">
                                    <li>
                                        <a href="{{ url(route('frontend.courses.show',$course->translate('en')->slug)) }}" data-tip="View Details">
                                            <i class="ti-eye"></i>
                                        </a>
                                    </li>
                                    @if (count($course->subscribed) <= 0)
                                        <li>
                                        <a href="{{ url(route('frontend.cart.add',$course->translate('en')->slug)) }}" data-tip="{{ __('apps::frontend.buttons.add_to_cart') }}">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="content-block">
                                <div class="class-instructor d-flex">
                                    <a href="#." class="d-flex align-items-center">
                                        <img class="img-fluid flex-1" src="{{ url($course->trainer->image) }}" alt="" />
                                        {{ $course->trainer->name }}
                                    </a>
                                </div>
                                <h3>
                                    <a href="{{ url(route('frontend.courses.show',$course->translate('en')->slug)) }}" class="event-title">
                                        {{ $course->translate(locale())->title }}
                                    </a>
                                </h3>
                                <ul class="content-list d-flex">
                                    <li class="flex-1"><i class="ti-timer"></i>
                                        {{ $course->class_time }}
                                        {{ __('course::frontend.courses.index.class_hrs') }}
                                    </li>
                                    <li class="course-price justify-content-end">
                                        {{ $course->price }} KWD
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination-items pag-{{color_theme($category)}} mt-20">
                    <ul class="pagination d-md-flex justify-content-center align-items-md-center">
                        {{ $courses->appends(Request::except('page'))->links() }}
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>

@stop
@section('scripts')
    <script src="/frontend/en/js/showmoreless.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(e){
            $('.show-less-div-4').myOwnLineShowMoreLess({
                showLessText:'{{ __('category::frontend.index.show_less') }}',
                showMoreText:'{{ __('category::frontend.index.show_more') }}',
            });
        });
    </script>
@endsection
