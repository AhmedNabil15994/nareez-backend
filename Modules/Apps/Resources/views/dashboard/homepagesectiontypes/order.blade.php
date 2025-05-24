@extends('apps::dashboard.layouts.app')
@section('title', __('apps::dashboard.homepagesectiontypes.routes.update'))
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
                        <a href="{{ url(route('dashboard.homepagesectiontypes.index')) }}">
                            {{__('apps::dashboard.homepagesectiontypes.routes.index')}}
                        </a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{__('apps::dashboard.homepagesectiontypes.routes.update')}}</a>
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
                  @include('apps::dashboard.homepagesectiontypes.forms.order-form')
                                    </div>
                                </div>
                                {{-- PAGE ACTION --}}
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        @include('apps::dashboard.layouts._ajax-msg')
                                        <div class="form-group">

                                            <a href="{{url(route('dashboard.homepagesectiontypes.index')) }}" class="btn btn-lg red">
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


