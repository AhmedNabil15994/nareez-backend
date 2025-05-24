@if($reviews->count()>0)
<div class="section">
  <div class="container">
    <h2 class="section-title2 text-center wow fadeInUp">{{ __('Testimonials') }}</h2>
    <div class="testimonials owl-carousel">
      @foreach($reviews as $key => $review)
      <div class="item">
        <div class="testimonial">
          <p> {{ $review->desc }}
          </p>
          <div class="d-flex flex-column justify-content-end">
            <h4>{{ $review->user->name }}</h4>
            <span>{{ __('Student') }}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif
