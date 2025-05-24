@extends('apps::frontend.layouts.app')
@section('title', auth()->user()->name )
@section('content')
@include('apps::frontend.layouts._alerts')
<div class="inner-page grey-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-9 row">
        @foreach($courses as $key => $course)
        <div class="col-md-4 col-6 py-4">
          @include('course::frontend.courses.components.single-course')
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>


@stop
