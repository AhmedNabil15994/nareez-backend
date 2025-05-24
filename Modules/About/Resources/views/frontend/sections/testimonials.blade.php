<section class="section gredient-light">
  <div class="container">
    <div class="title-center">
      <h2 class="wow fadeInUp"
        data-wow-delay="0.2s"> {{ $type->title }}</h2>
      <img class="img-fluid"
        src="{{ asset('frontend/images/title-shape.png') }}"
        alt="" />
    </div>
    <div class="testimonials owl-carousel animated">
      @foreach($testimonials as $key => $opinion)
      <div class="item">
        <div class="testimonial-block">
          <div class="img-block">
            <img class="img-fluid"
              src="{{ asset($opinion->image) }}"
              alt="" />
          </div>
          <p>
            {!! $opinion->desc !!}
          </p>
          <h4> {!! $opinion->title !!}</h4>
        </div>
      </div>

      @endforeach

    </div>
  </div>
</section>
