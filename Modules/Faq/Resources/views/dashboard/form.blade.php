{!! field()->langNavTabs() !!}
<div class="tab-content">
    @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
        <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
             id="first_{{$code}}">
            {!! field()->text('title['.$code.']',
               __('faq::dashboard.faqs.form.title').'-'.$code ,
                    $model->getTranslation('title' , $code),
                  ['data-name' => 'title.'.$code]
             ) !!}
            {!! field()->text('desc['.$code.']',
              __('faq::dashboard.faqs.form.desc').'-'.$code ,
                    $model->getTranslation('desc' , $code),
                  ['data-name' => 'desc.'.$code]
             ) !!}
        </div>
    @endforeach
</div>

{!! field()->checkBox('status', __('faq::dashboard.faqs.form.status')) !!}


