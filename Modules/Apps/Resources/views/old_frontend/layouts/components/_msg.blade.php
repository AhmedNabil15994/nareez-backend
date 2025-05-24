{{-- Errors --}}
@if($errors->all())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

{{-- Success --}}
@if(session('msg'))
<div class="alert alert-{{session('alert')}}" role="alert">
    <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
    <span>{{session('msg')}} {!! session('html') !!}</span>
</div>
@endif
