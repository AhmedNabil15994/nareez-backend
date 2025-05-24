@extends('apps::dashboard.layouts.app')
@section('title', __('about::dashboard.abouttypes.routes.update'))
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ route('dashboard.home') }}">{{ __('apps::dashboard.index.title') }}</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ url(route('dashboard.abouttypes.index')) }}">
                            {{__('about::dashboard.abouttypes.routes.index')}}
                        </a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{__('about::dashboard.abouttypes.routes.update')}}</a>
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
                                <div class="tab-pane active fade in" id="global_setting">
                                    <div class="col-md-12">
                  @include('about::dashboard.abouttypes.forms.order-form')
                                    </div>
                                </div>
                                {{-- PAGE ACTION --}}
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        @include('about::dashboard.layouts._ajax-msg')
                                        <div class="form-group">

                                            <a href="{{url(route('dashboard.abouttypes.index')) }}" class="btn btn-lg red">
                                                {{__('apps::dashboard.buttons.back')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@stop


