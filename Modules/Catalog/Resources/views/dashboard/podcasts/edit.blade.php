@extends('apps::dashboard.layouts.app')
@section('title', __('catalog::dashboard.podcasts.routes.update'))
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
                        <a href="{{ url(route('dashboard.podcasts.index')) }}">
                            {{__('catalog::dashboard.podcasts.routes.index')}}
                        </a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{__('catalog::dashboard.podcasts.routes.update')}}</a>
                    </li>
                </ul>
            </div>

            <h1 class="page-title"></h1>

            <div class="row">
                <form id="updateForm" page="form" class="form-horizontal form-row-seperated" method="post"
                      enctype="multipart/form-data" action="{{route('dashboard.podcasts.update',$model->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">

                        {{-- RIGHT SIDE --}}
                        <div class="col-md-3">
                            <div class="panel-group accordion scrollable" id="accordion2">
                                <div class="panel panel-default">

                                    <div id="collapse_2_1" class="panel-collapse in">
                                        <div class="panel-body">
                                            <ul class="nav nav-pills nav-stacked">
                                                <li class="active">
                                                    <a href="#global_setting" data-toggle="tab">
                                                        {{ __('catalog::dashboard.podcasts.form.tabs.general') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- PAGE CONTENT --}}
                        <div class="col-md-9">
                            <div class="tab-content">

                                {{-- UPDATE FORM --}}
                                <div class="tab-pane active fade in" id="global_setting">
                               
                                    <div class="col-md-10">

                                        <div class="tabbable">
                                            <ul class="nav nav-tabs bg-slate nav-tabs-component">
                                                @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
                                                    <li class=" {{ ($code == locale()) ? 'active' : '' }}">
                                                        <a href="#colored-rounded-tab-general-{{$code}}"
                                                           data-toggle="tab"
                                                           aria-expanded="false"> {{ $lang['native'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="tab-content">
                                            @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
                                                <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
                                                     id="colored-rounded-tab-general-{{$code}}">
                                                    <div class="form-group">
                                                        <label class="col-md-2">
                                                            {{__('catalog::dashboard.podcasts.form.title')}}
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="title[{{$code}}]"
                                                                   class="form-control" data-name="title.{{$code}}"
                                                                   value="{{ $model->getTranslation('title' , $code)  }}" {{ (is_rtl($code) == 'rtl') ? 'dir=rtl' : '' }}>
                                                            <div class="help-block"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {!! field()->file('audio', __('catalog::dashboard.podcasts.form.audio')) !!}
                                        @if($model->getFirstMediaUrl('audio'))
                                            <audio controls>
                                                <source src="{{$model->getFirstMediaUrl('audio')}}">
                                            </audio>
                                            <br>
                                        @endif

                                        {!! field()->file('image', __('catalog::dashboard.podcasts.form.image'), $model->thumb ? asset($model->thumb) : null) !!}

                                        <div class="form-group">
                                            <label class="col-md-2">
                                                {{__('catalog::dashboard.podcasts.form.status')}}
                                            </label>
                                            <div class="col-md-9">
                                                <input type="checkbox" class="make-switch" id="test" data-size="small"
                                                       name="status" {{($model->status == 1) ? ' checked="" ' : ''}}>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- PAGE ACTION --}}
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        @include('apps::dashboard.layouts._ajax-msg')
                                        <div class="form-group">
                                            <button type="submit" id="submit" class="btn btn-lg green">
                                                {{__('apps::dashboard.buttons.edit')}}
                                            </button>
                                            <a href="{{url(route('dashboard.podcasts.index')) }}"
                                               class="btn btn-lg red">
                                                {{__('apps::dashboard.buttons.back')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('scripts')

    <script type="text/javascript">
        $(function () {
            $('#jstree').jstree();

            $('#jstree').on("changed.jstree", function (e, data) {
                $('#root_category').val(data.selected);
            });
        });
    </script>

    <script>

        $('.24_format').timepicker({
            showMeridian: true,
            format: 'hh:mm',
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '0d'
        });

    </script>

    <script>
        // GALLERY FORM / ADD NEW UPLOAD BUTTON
        $(document).ready(function () {
            var html = $("div.getGalleryForm").html();
            $(".addGallery").click(function (e) {
                e.preventDefault();
                $(".galleryForm").append(html);
                $('.lfm').filemanager('image');
            });
        });

        // DELETE UPLOAD BUTTON & IMAGE
        $(".galleryForm").on("click", ".delete-gallery", function (e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
        });
    </script>

@stop
