{!! field()->langNavTabs() !!}
<div class="tab-content">
     @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
     <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
          id="first_{{$code}}">
          {!! field()->text('title['.$code.']',
          __('service::dashboard.services.form.title').'-'.$code ,
          $model->getTranslation('title' , $code),
          ['data-name' => 'title.'.$code]
          ) !!}
          {!! field()->ckEditor5('description['.$code.']',
          __('service::dashboard.services.form.description').'-'.$code ,
          $model->getTranslation('title' , $code),
          ['data-name' => 'description.'.$code]
          ) !!}
     </div>
     @endforeach
</div>

{{-- {!! field()->text('link', __('service::dashboard.services.form.link')) !!}



{!! field()->select('color',__('service::dashboard.services.form.color') , $model->availableColors(), null , ['id' =>
'single']) !!} --}}


{!! field()->checkBox('status', __('service::dashboard.services.form.status')) !!}
{{-- {!! field()->file('image', __('service::dashboard.services.form.image')) !!} --}}
