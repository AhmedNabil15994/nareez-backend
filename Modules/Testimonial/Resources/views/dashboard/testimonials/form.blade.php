@inject('courses' ,'Modules\Course\Entities\Course')

{!! field()->langNavTabs() !!}

<div class="tab-content">
    @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
    <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
        id="first_{{$code}}">
        {!! field()->text('title['.$code.']',
        __('testimonial::dashboard.testimonials.form.title').'-'.$code ,
        $model->getTranslation('title',$code),
        ['data-name' => 'title.'.$code]
        ) !!}
        {!! field()->ckEditor5('desc['.$code.']',
        __('testimonial::dashboard.testimonials.form.desc').'-'.$code ,
        $model->getTranslation('desc',$code),
        ['data-name' => 'desc.'.$code]
        ) !!}
    </div>
    @endforeach
</div>


{!! field()->file('image', __('testimonial::dashboard.testimonials.form.image'), asset($model->image)) !!}



{!! field()->checkBox('status', __('slider::dashboard.sliders.form.status')) !!}
@if ($model->trashed())
{!! field()->checkBox('trash_restore', __('slider::dashboard.sliders.form.restore')) !!}
@endif
