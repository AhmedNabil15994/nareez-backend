@extends('apps::frontend.layouts.app')
@section('title', __('catalog::frontend.podcasts.index.title') )
@section('content')

    <section class="page-head align-items-center text-center d-flex">
        <div class="container">
            <h1>{{__('catalog::frontend.podcasts.index.title')}}</h1>
        </div>
    </section>
    <div class="inner-page grey-bg">
        <div class="container">
            <div class="row">

                @if (count($podcasts) > 0)
                    @foreach ($podcasts as $podcast)
                            <div class="col-md-4 wow fadeInUp">
                                <div class="podcast-block">
                                    <div class="img-block">
                                        <img class="img-fluid" src="{{asset($podcast->thumb)}}"/>
                                    </div>
                                    <div class="podcast-content d-flex align-items-center justify-content-between">
                                        <a class="play-podcast" href="#" data-toggle="modal"
                                           data-target="#record-{{$podcast->id}}"><i
                                                class="fas fa-play"></i></a>

                                        <h3><a class="bodcast-title">{{$podcast->title}}</a></h3>
                                        <span class="podcast-duration">
                                        {{ \Carbon\Carbon::parse('00:00:00')->addMinutes($podcast->duration)->toTimeString() }}
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade breathing-modal" id="record-{{$podcast->id}}" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content course-preview-modal">
                                        <div class="modal-header">
                                            {{-- <h5 class="modal-title">Intro video</h5> --}}
                                            <button type="button" class="close" data-dismiss="modal" onclick="pausePreview()">
                                                <span aria-hidden="true"><i class="ti-close"></i> </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="course-preview-video-wrap">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <link rel="stylesheet" href="/frontend/en/css/plyr.css">

                                                    <div style="    text-align: center;background: #191245;">
                                                        <audio controls>
                                                            <source src="{{$podcast->getFirstMediaUrl('audio')}}">
                                                        </audio>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endif
            </div>

            @include('apps::frontend.layouts.components.paginations',['paginator' => $podcasts])
        </div>
    </div>
    @include('course::frontend.courses.modals.video')
@stop

@push('scripts')
    <script src="https://player.vdocipher.com/playerAssets/1.6.10/vdo.js"></script>
    <script src="/frontend/en/js/plyr.js"></script>

    <script>
        const player = new Plyr('.player');

        function pausePreview() {
            $('audio').each(function(){
                this.pause(); // Stop playing
                this.currentTime = 0; // Reset time
            });
            player.pause();
        }
    </script>
    <script>
        $(document).ready(function () {

            $('.lesson_video').on('click', function (e) {

                var video_id = $(this).attr('data-video-id');

                $.ajax({
                    url: '{{url(route('frontend.videos'))}}',
                    type: 'GET',
                    data: {
                        video_id: video_id,
                    },
                    beforeSend: function () {
                        $(".player_video").html('<div class="preloader"><div class="boxplus-load"></div></div>');
                    },
                    success: function (data) {
                        $('.player_video').html(data);
                    },
                    complete: function (data) {
                    },
                });

            });

        });
    </script>
@endpush

