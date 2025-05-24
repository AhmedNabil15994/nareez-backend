@extends('apps::frontend.layouts.app')
@section('title', __('Frequently Asked Questions'))
@section('content')

<div class="page-content">
  <div class="container">
    <h1 class="text-center description-title py-4">
      {{ __('Frequently Asked Questions') }}
    </h1>

    <div class="col-md-12">
      @foreach ($faqs as $key =>$question )
      <div class="card">
        <div class="card-header"
          id="heading{{$key}}">
          <h2>
            {{ $question->title }}
          </h2>
          <p> {!! $question->desc !!}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
