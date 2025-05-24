<div class="section grey-bg">
  <div class="container">
    @foreach($type->homepageSections as $key => $section)
    @if($loop->odd)
    <div class="row feature-block">
      <div class="col-md-5 wow fadeInUp">
        <div class="img-box">
          <img class="img-fluid"
            src="{{ asset($section->image) }}"
            alt="" />
        </div>
      </div>
      <div class="col-md-7 wow fadeInUp">
        <h2 class="section-title3">{!! strip_tags($section->title) !!}</h2>
        <p>
          {!! $section->desc !!}
        </p>
        <a class="btn theme-btn"
          href="{{ $section->link }}">{{ __('Learn more') }}</a>
      </div>
    </div>
    @elseif($loop->even)
    <div class="row feature-block">
      <div class="col-md-7 wow fadeInUp">
        <h2 class="section-title3">{!! strip_tags($section->title) !!}</h2>
        <p>
          {!! $section->desc !!}
        </p>
        <a class="btn theme-btn"
          href="{{ $section->link }}">{{ __('Learn more') }}</a>
      </div>
      <div class="col-md-5 wow fadeInUp">
        <div class="img-box">
          <img class="img-fluid"
            src="{{ asset($section->image) }}"
            alt="" />
        </div>
      </div>

    </div>
    @endif
    @endforeach

  </div>
</div>
