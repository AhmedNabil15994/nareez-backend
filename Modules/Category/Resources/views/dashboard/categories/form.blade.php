{!! field()->langNavTabs() !!}

<div class="tab-content">
    @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
    <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}"
        id="first_{{$code}}">
        {!! field()->text('title['.$code.']',
        __('category::dashboard.categories.form.title').'-'.$code ,
        $model->getTranslation('title' , $code),
        ['data-name' => 'title.'.$code]
        ) !!}
        {!! field()->ckEditor5('description['.$code.']',
        __('category::dashboard.categories.form.description').'-'.$code ,
        $model->getTranslation('description' , $code),
        ['data-name' => 'description.'.$code]
        ) !!}
    </div>
    @endforeach
</div>

{!! field()->file('image', __('category::dashboard.categories.form.image'), $model->image ? url($model->image) : null)
!!}
{!! field()->checkBox('status', __('category::dashboard.categories.form.status')) !!}
@if ($model->trashed())
{!! field()->checkBox('trash_restore', __('category::dashboard.categories.form.restore')) !!}
@endif
{!! Form::hidden('category_id' , null ,['id' => 'root_category']) !!}
