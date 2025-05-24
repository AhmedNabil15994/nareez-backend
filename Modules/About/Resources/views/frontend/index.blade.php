@extends('apps::frontend.layouts.app')
@section('title',  __('about::frontend.index.title'))
@section('content')

<div class="page-head d-flex align-items-center text-center">
    <div class="container position-relative">
        <h1>{{ __('about::frontend.index.title') }}</h1>
        <div class="breadcrumb justify-content-center">
            <span>
                <a title="Homepage" href="{{ route('frontend.home') }}"><i class="ti ti-home"></i>
               {{ __('apps::frontend.navbar.home') }}
                </a>
            </span>
            <span class="bread-sep">&nbsp; | &nbsp;</span>
            <span>  {{ __('about::frontend.index.title') }}</span>
        </div>
    </div>
</div>




<div class="page-content">


    @foreach ($types as $type)
        @includeIf("about::frontend.sections.$type->key",['type'=>$type])
    @endforeach




</div>






@endsection





