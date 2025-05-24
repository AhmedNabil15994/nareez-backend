@extends('apps::frontend.layouts.app')
@section('title', $second_section['title'] )
@section('content')
    <section class="about-section">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-5 content text-center">
                    <p>

                        {!! $first_section['description'] !!}

                    </p>
                    <span>Dr. Amal Alanari</span>
                    <a href="#sec2"><i class="ti-angle-down"></i></a>
                </div>
            </div>
        </div>
    </section>
    <div class="about-sec2" id="sec2">
        <div class="container">
            <div class="content">
                <h2>{{ $second_section['title'] }} </h2>
                <p>
                    {!! $second_section['description'] !!}
                </p>
                <div class="d-flex justify-content-lg-end">
                    <a href="{{route('frontend.auth.register')}}" class="btn theme-btn">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <section class="about-section2">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-6 content">
                    {!! $third_section['description'] !!}

                </div>
            </div>
        </div>
    </section>
    @if(count($clients))
        <div class="section-block section">
            <div class="container">
                <h1 class="title text-center">Certificates</h1>
                <div class="clients-list owl-carousel owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                             style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 3360px;">
                            @php $counter = 1 @endphp
                            @foreach($clients as $client)
                                <div class="owl-item {{$counter < 4 ? 'active' : ''}}"
                                     style="width: 214px; margin-right: 10px;">
                                    <div class="item">
                                        <div class="client-block"><img class="img-fluid" src="{{asset($client->image)}}"
                                                                       alt="">
                                        </div>
                                    </div>
                                </div>

                                @php $counter++ @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span>
                        </button>
                        <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span>
                        </button>
                    </div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot active"><span></span></button>
                        <button role="button" class="owl-dot"><span></span></button>
                        <button role="button" class="owl-dot"><span></span></button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop
