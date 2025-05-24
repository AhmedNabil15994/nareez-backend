@extends('apps::dashboard.layouts.app')
@section('title', __('user::dashboard.threads.routes.show'))
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(route('dashboard.home')) }}">{{ __('apps::dashboard.index.title') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ url(route('dashboard.threads.index')) }}">
                        {{__('user::dashboard.threads.routes.index')}}
                    </a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">{{__('user::dashboard.threads.routes.show')}}</a>
                </li>
            </ul>
        </div>

        <h1 class="page-title"></h1>

        <div class="row">

            <div class="col-md-12">

                {{-- RIGHT SIDE --}}


                {{-- PAGE CONTENT --}}
                <div class="col-md-12">
                    <div class="tab-content">

                        {{-- UPDATE FORM --}}
                        <div class="tab-pane active fade in"
                            id="global_setting">
                            <div class="col-md-10">
                                @foreach($model->messages as $message)
                                <div
                                    class="alert {{$model->first_side==$message->sender_id ?'alert-info':'alert-danger' }}">
                                  {{ $message->message }}
                        <br>
                                  <a href="{{ $message->getFirstMediaUrl('media') }}"
                                        target="_blank">
                                        <img width="200"
                                            src="{{ $message->getFirstMediaUrl('media') }}"
                                            alt="">
                                    </a>
                                    <br>
                                    <button
                                        class="btn {{$model->first_side==$message->sender_id ?'btn-info':'btn-danger' }}">
                                        @lang('user::dashboard.threads.sender'):{{ optional($message->sender)->name }}
                                    </button>
                                </div>
                                @endforeach



                            </div>
                        </div>
                        {{-- END UPDATE FORM --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
