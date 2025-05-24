<div class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="custom-content">
                    <h3 class="inner-pageTitle">{{ $type->title }}</h3>
                   {!! $type->desc !!}
                    <a class="btn btn-theme" href="{{ route('frontend.levels.index') }}"><span>
                     {{ __('about::frontend.index.start_study_with_us') }}
                    </span></a>
                </div>
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="img-box img-animate">
                    <img src="{{asset($type->image)}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
