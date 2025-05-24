@extends('apps::frontend.layouts.app')
@section('title', __('Writing & Translation'))
@section('content')
<section class="page-head align-items-center text-center d-flex">
    <div class="container">
        <h1>{{ __('Writing & Translation') }}</h1>
    </div>
</section>
<div class="inner-page grey-bg">
    <div class="container">
        <div class="custom-form">
            <h2 class="form-title text-center">{{ __('Please fill the following fields') }}</h2>
            {!! Form::open([
            'url'=> route('frontend.services.apply'),
            'method'=>'POST',
            'id'=>'form',
            'role'=>'form',
            'class'=>'login-form active',
            'files' => true
            ])!!}


            <div class="row">
                <div class="col-md-6">

                    <div>
                        {!! field('frontend')->text('name',__('Your full Name *'))!!}
                    </div>

                    <div>
                        {!! field('frontend')->email('email',__('Your Email *') )!!}
                    </div>
                    <div>
                        {!!
                        field('frontend')->select('service_id',__('Service'),$services->pluck('title','id'),old('service_id'),
                        ["data-select2-id"=>"1", "tabindex"=>"-1", "aria-hidden"=>"true"]) !!}
                    </div>
                    <div>
                        {!! field('frontend')->ckEditor5('desc',__('Explain your Needs
                        *'),null,['class'=>'form-control'] )!!}
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="custom-upload">
                        <span>
                            <i class="fas fa-file"></i>
                            {!! __('Upload your files (pdf, docs only)') !!}
                        </span>

                        {!! field('frontend')->file('file',__('Your file *') ,null)!!}


                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn main-custom-btn"
                    type="submit"> {{ __('Send Request') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection


@push('styles')
<style>
    .hide {
        display: none
    }

</style>
@endpush
