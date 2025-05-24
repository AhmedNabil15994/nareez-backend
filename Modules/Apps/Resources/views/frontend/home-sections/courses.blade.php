@if(count($records) > 0)
<div class="container {{isset($home->classes['container']) ? $home->classes['container'] : ''}}">
  <div class="home-products">
    <h3 class="slider-title {{isset($home->classes['title']) ? $home->classes['title'] : ''}}"> {{$home->title}}</h3>
    <div class="owl-carousel products-slider">
      @foreach($records as $k => $record)
      @include('course::frontend.courses.components.single-course',['course'=> $record,
      'wrapperClass'=>'col-md-4 wowfadeInUp',
      'home' => $home])
      @endforeach
    </div>
  </div>
</div>
@endif
