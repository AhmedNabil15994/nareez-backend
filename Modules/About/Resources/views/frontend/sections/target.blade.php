<div class="section">
    <div class="container">
        @foreach($type->sections as $key => $section)
        <div class="row d-flex align-items-center justify-content-around inner-block wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-md-3">
                <h4 class="mission-title">
                    <p>
                        <img src="{{ asset($section->image) }}" alt="">
                    </p>
                    {{ $section->title }}
                </h4>
            </div>
            <div class="col-md-9">
                <div class="custom-content">
                   {!! $section->desc !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
