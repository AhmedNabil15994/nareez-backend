@inject('types', 'Modules\About\Entities\AboutType')
{!! field()->langNavTabs() !!}
<div class="tab-content">
     @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
     <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
          id="first_{{$code}}">
          {!! field()->text('title['.$code.']',
          __('about::dashboard.abouts.form.title').'-'.$code ,
          $model->getTranslation('title' , $code),
          ['data-name' => 'title.'.$code]
          ) !!}
          {!! field()->ckEditor5('desc['.$code.']',
          __('about::dashboard.abouts.form.desc').'-'.$code ,
          $model->getTranslation('desc' , $code),
          ['data-name' => 'description.'.$code]
          ) !!}

     </div>
     @endforeach
</div>

{!! field()->file('image', __('about::dashboard.abouts.form.image'),$model->image?asset($model->image):'') !!}

{!! field()->select('type',__('about::dashboard.abouts.form.abouttypes') , $types->pluck('title','key'), null , ) !!}

{!! field()->text('link', __('about::dashboard.abouts.form.link')) !!}
{!! field()->checkBox('status', __('about::dashboard.abouts.form.status')) !!}
