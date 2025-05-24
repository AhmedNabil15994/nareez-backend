@inject('levels', 'Modules\Course\Entities\Level')
{!! field()->langNavTabs() !!}
<div class="tab-content">
     @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
     <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
          id="first_{{$code}}">
          {!! field()->text('title['.$code.']',
          __('about::dashboard.abouttypes.form.title').'-'.$code ,
          $model->getTranslation('title' , $code),
          ['data-name' => 'title.'.$code]
          ) !!}
          {!! field()->ckEditor5('desc['.$code.']',
          __('about::dashboard.abouttypes.form.desc').'-'.$code ,
          $model->getTranslation('desc' , $code),
          ['data-name' => 'description.'.$code]
          ) !!}

     </div>
     @endforeach
</div>

{!! field()->file('image', __('apps::dashboard.homepagesectiontypes.form.image'),
$model->image?asset($model->image):'') !!}

{!! field()->number('order', __('apps::dashboard.homepagesectiontypes.form.order')) !!}

{!! field()->checkBox('status', __('apps::dashboard.homepagesectiontypes.form.status')) !!}
