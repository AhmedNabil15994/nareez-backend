@extends('apps::frontend.layouts.app')
@section('title', $page->title )
@section('content')

<div class="inner-page grey-bg">
  <div class="container">
    <div class="row">
      <div class="class-description">
        <div class="description-box mb-30 ">
          <p>
            {!! $page->description !!}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
