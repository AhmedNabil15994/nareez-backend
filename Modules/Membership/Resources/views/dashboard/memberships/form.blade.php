{!! field()->langNavTabs() !!}

<div class="tab-content">
    @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
    <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
        id="first_{{$code}}">
        {!! field()->text('title['.$code.']',
        __('membership::dashboard.memberships.form.title').'-'.$code ,
        $model->getTranslation('title' , $code),
        ['data-name' => 'title.'.$code]
        ) !!}
    </div>
    @endforeach
</div>

{!! field()->number('courses_count', __('membership::dashboard.memberships.form.courses_count')) !!}

{!! field()->file('image', __('membership::dashboard.memberships.form.image'),$model->getFirstMediaUrl('images')) !!}

