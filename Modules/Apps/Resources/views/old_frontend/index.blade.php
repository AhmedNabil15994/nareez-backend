@extends('apps::frontend.layouts.app')
@section('title',  __('Homepage'))
@section('content')
@foreach ($types as $type)
@includeIf("apps::frontend.sections.$type->key",['type'=>$type])
@endforeach
@includeIf("apps::frontend.sections.testimonial")
@endsection

