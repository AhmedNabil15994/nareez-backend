@extends('apps::frontend.layouts.app')
@section('title', 'send message')
@section('content')
<div class="myprofile-head bg-white d-flex align-items-center container">
    <div class="img-block">
        <img class="img-fluid"
            src="{{ asset(auth()->user()->image) }}"
            alt="" />
    </div>
    <div class="profile-det">
        <h4>
            {!! auth()->user()->nameWithMembership() !!}
            <img src="{{ asset('frontend/images/featured.svg') }}" />
        </h4>
        <p>{{ auth()->user()->email }}</p>
        <a class="btn theme-btn"
            href="{{ route('frontend.profile.index') }}">{{ __('Edit Profile') }}</a>
    </div>
</div>
<div class="container">
    <div class="tab-menu">
        <a href="{{ route('frontend.profile.courses') }}"><i class="fas fa-briefcase"></i> {{ __('My courses') }}</a>
        <a class="active"
            href="{{ route('frontend.calender') }}"><i class="fas fa-calendar-alt"></i> {{ __('Calender') }}</a>
    </div>
</div>

<div class="inner-page grey-bg">
    <div class="container">
        <div id="wrap">
            <div id='calendar'></div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    window.calenderData=JSON.parse('@json($result)')
      window.routes={
          'live_course_route':'{{ route('course.live',':id') }}'
      }
</script>

<script src="{{ asset('frontend/js/calender.js') }}"></script>
@endpush
