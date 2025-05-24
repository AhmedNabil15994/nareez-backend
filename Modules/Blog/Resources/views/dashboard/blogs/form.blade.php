{!! field()->langNavTabs() !!}
<div class="tab-content">
  @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
  <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
    id="first_{{$code}}">
    {!! field()->text('title['.$code.']',
    __('blog::dashboard.blogs.form.title').'-'.$code ,
    $model->getTranslation('title' , $code),
    ['data-name' => 'title.'.$code]
    ) !!}
    {!! field()->ckEditor5('description['.$code.']',
    __('blog::dashboard.blogs.form.description').'-'.$code ,
    $model->getTranslation('description' , $code),
    ['data-name' => 'title.'.$code]
    ) !!}
  </div>
  @endforeach
</div>


{!! field()->select('trainer_id',__('blog::dashboard.blogs.form.trainer') , $trainers->pluck('name','id')->toArray())!!}
{!! field()->file('image',__('blog::dashboard.blogs.form.image'))!!}


{{-- {!! field()->checkBox('is_news', __('blog::dashboard.blogs.form.is_news')) !!} --}}
{!! field()->checkBox('status', __('blog::dashboard.blogs.form.status')) !!}
