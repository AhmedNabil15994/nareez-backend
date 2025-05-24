@inject('exams', 'Modules\Exam\Entities\Exam')
{!! field()->langNavTabs() !!}
<div class="tab-content">
  @foreach (config('laravellocalization.supportedLocales') as $code => $lang)
  <div class="tab-pane fade in {{ ($code == locale()) ? 'active' : '' }}" id="first_{{$code}}">
    {!! field()->text('title['.$code.']',
    __('course::dashboard.lessoncontents.form.title').'-'.$code ,
    $model->getTranslation('title' , $code),
    ['data-name' => 'title.'.$code]
    ) !!}
  </div>
  @endforeach
</div>

<div class="row">
  <div class="col-md-10">
    {!! field()->select('lesson_id',__('course::dashboard.lessoncontents.form.lessons'),$extraData['courses']) !!}
  </div>
  <div class="col-md-2">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#extraLesson">+</button>
  </div>

</div>




<div @if($model->id!==null) hidden @endif >

  {!! field()->select('type',__('course::dashboard.lessoncontents.form.type'),$model->availableTypes()) !!}
</div>

{!! field()->number('order', __('course::dashboard.lessoncontents.form.order')) !!}





{!! field()->select('exam_id',__('course::dashboard.lessoncontents.form.exams'),$exams->pluck('title','id')) !!}


{!! field()->file('video', __('course::dashboard.lessoncontents.form.types.video')) !!}


{!! field()->file('resource', __('course::dashboard.lessoncontents.form.types.resource')) !!}


@if($model->type=='video')
@include('course::dashboard.lessoncontents.forms.video')
@elseif($model->type=='resource')
@include('course::dashboard.lessoncontents.forms.resource')
@endif

<input type="hidden" name="model_type" value="{{ $model->type }}">

@push('scripts')
<script>
  $("[name='type']").on('change',function(){
          const type=$(this).val();
          hideAll(["#resource_wrap","#exam_id_wrap",'#video_wrap'])
          $(`#${type}_wrap`).show()
          $(`#${type}_id_wrap`).show()
        }).change()

        function hideAll(hideItems){
            hideItems.forEach(function(item){
                 $(item).hide()
             })
          }
</script>
@endpush


<!-- Button trigger modal -->


<!-- Modal -->
