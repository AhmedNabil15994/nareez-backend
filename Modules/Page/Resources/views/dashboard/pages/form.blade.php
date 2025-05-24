{!! field()->langNavTabs() !!}
<div class="tab-content">
     @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
     <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
          id="first_{{$code}}">
          {!! field()->text('title['.$code.']',
          __('page::dashboard.pages.form.title').'-'.$code ,
          $model->getTranslation('title' , $code),
          ['data-name' => 'title.'.$code]
          ) !!}
          {!! field()->ckEditor5('description['.$code.']',
          __('page::dashboard.pages.form.description').'-'.$code ,
          $model->getTranslation('description' , $code),
          ['data-name' => 'description.'.$code]
          ) !!}
     </div>
     @endforeach
</div>

{!! field()->checkBox('status', __('page::dashboard.pages.form.status')) !!}
