{!! field()->langNavTabs() !!}

<div class="tab-content">
  @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
  <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}" id="first_{{$code}}">
    {!! field()->text('title['.$code.']',
    __('course::dashboard.courses.form.title').'-'.$code ,
    $model->getTranslation('title' , $code),
    ['data-name' => 'title.'.$code]
    ) !!}
    {!! field()->text('short_desc['.$code.']',
    __('course::dashboard.courses.form.short_desc').'-'.$code ,
    $model->getTranslation('short_desc' , $code),
    ['data-name' => 'short_desc.'.$code]
    ) !!}
    {!! field()->ckEditor5('description['.$code.']',
    __('course::dashboard.courses.form.description').'-'.$code ,
    $model->getTranslation('description' , $code),
    ['data-name' => 'description.'.$code]
    ) !!}
    {!! field()->ckEditor5('requirements['.$code.']',
    __('course::dashboard.courses.form.requirements').'-'.$code ,
    $model->getTranslation('requirements' , $code),
    ['data-name' => 'requirements.'.$code]
    ) !!}
  </div>
  @endforeach
</div>


{!! field()->select('trainer_id',__('course::dashboard.courses.form.trainers') , $trainers->pluck('name','id'), null , )
!!}


{!! field()->text('class_time', __('course::dashboard.courses.form.class_time').'/ Hrs') !!}



{!! field()->file('intro_video', __('course::dashboard.courses.form.intro_video')) !!}


@if($model->id)
<div>
  @if(data_get($model,'video.video_status')== 'loaded')
  {!! $extraData['video_view'] !!}
  @else
  <div class="text-center" style="background-color: #ffc96559;
padding: 14px;
border: 1px solid orange;">{{__('course::dashboard.videos.loading')}}</div>
  @endif
</div>
@endif



{!! field()->file('image', __('course::dashboard.courses.form.image'),$model->id?asset($model->image):null) !!}
{!! field()->checkBox('is_certificated', __('course::dashboard.courses.form.is_certificated')) !!}


{{-- {!! field()->select('extra_attributes[gender][]',
__('course::dashboard.courses.form.genderType'),
__('course::dashboard.courses.form.genderTypes') ,$model->extra_attributes->get('gender',[])
,['multiple'=>'multiple','data-name'=>'extra_attributes.gender']
) !!} --}}

{!! field()->number('price', __('course::dashboard.courses.form.price'),null,['step'=>'0.01']) !!}


{{-- {!! field()->checkBox('is_live', __('course::dashboard.courses.form.is_live')) !!} --}}

{!! field()->checkBox('is_published', __('course::dashboard.courses.form.is_published')) !!}

@if ($model->trashed())
{!! field()->checkBox('trash_restore', __('course::dashboard.levels.form.restore')) !!}
@endif





@push('scripts')
<script type="text/javascript">
  $(function() {
        $('#jstree').jstree();

        $('#jstree').on("changed.jstree", function(e, data) {
            $('#root_category').val(data.selected);
        });
    });
</script>
@endpush
