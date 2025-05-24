@extends('apps::frontend.layouts.app')
@section('title', 'send message')
@section('content')
<div class="inner-page grey-bg">
    <div class="container">
        <div class="messages-head">
            <h1 class="inner-title">{{ __('Messages') }}</h1>
        </div>
        <div class="messages-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="messages-list">
                        @include('user::frontend.partials-chat.default-chat')
                        @include('user::frontend.partials-chat.threads-bar')
                    </div>
                </div>
                @includeWhen($receiver&&!request()->has('default_chat'), 'user::frontend.partials-chat.chat-section')
                @includeWhen(!$receiver&&request()->has('default_chat'), 'user::frontend.partials-chat.chat-default-section')
            </div>
        </div>
    </div>
</div>

@endsection
