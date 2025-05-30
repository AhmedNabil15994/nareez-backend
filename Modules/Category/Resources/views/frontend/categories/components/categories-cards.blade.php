<div class="row">
  @foreach($records as $k => $record)
  <div class="col-md-3 col-6 {{isset($home->classes['cards']) ? $home->classes['cards'] : ''}}">
    <div class="cat-block text-center">
      <a href="{{route('frontend.courses',['category_id'=>$record->id] )}}">
        <div class="img-block">
          <img src="{{asset($record->image)}}" class="img-fluid" alt="{{ $record->title }}" />
        </div>
        <h4 style="padding: 7px 0px 18px 0px;">
          {{ $record->title }}
        </h4>
      </a>
    </div>
  </div>
  @endforeach
</div>
