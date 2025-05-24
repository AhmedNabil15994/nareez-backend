{!! field()->langNavTabs() !!}
<div class="tab-content">
  @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
  <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
    id="first_{{$code}}">
    {!! field()->text('title['.$code.']',
    __('course::dashboard.lessons.form.title').'-'.$code ,
    $model->getTranslation('title' , $code),
    ['data-name' => 'title.'.$code]
    ) !!}

  </div>
  @endforeach
</div>

{!! field()->select('course_id',__('course::dashboard.lessons.form.courses') , $courses->pluck('title','id'),$model->course_id??request('course_id') ) !!}

{!! field()->file('image', __('course::dashboard.courses.form.image'),$model->image?asset($model->image):null) !!}
{!! field()->checkBox('status', __('course::dashboard.courses.form.status')) !!}




@if ($model->trashed())
{!! field()->checkBox('trash_restore', __('course::dashboard.levels.form.restore')) !!}
@endif
