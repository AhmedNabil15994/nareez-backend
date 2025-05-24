<div class="section">
    <div class="container">
        <h2 class="section-title2 text-center wow fadeInUp">{!! $type->title !!}</h2>
        <div class="services row">
            @foreach($type->homepageSections as $key => $section)
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-block text-center">
                    <img class="img-fluid" src="{{ asset($section->image) }}" alt="">
                    <h3>{!! $section->title !!}</h3>
                    <p>{!! $section->desc !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
