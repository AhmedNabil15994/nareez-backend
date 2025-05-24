@if(count($records))
<div class="home-slider-container {{isset($home->classes['container']) ? $home->classes['container'] : ''}}">
  <div class="owl-carousel home-slides">
    @foreach($records as $k => $record)
    @foreach($record->active()->orderBy('order')->get() as $k => $advert)
    <div class="item {{isset($home->classes['cards']) ? $home->classes['cards'] : ''}}">
      <a href="{{$advert->link}}">
        <img src="{{ asset(str_replace(env('APP_URL'),'',$advert->getFirstMediaUrl('images'))) }}"
          alt="" />
      </a>
    </div>
    @endforeach
    @endforeach
  </div>
</div>
@endif
