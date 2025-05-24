<div class="col-md-7">
    <div class="message-block">
        <div class="m-head d-flex bg-white align-items-center">
            <div class="img-block">
                <img class="img-fluid"
                    src="{{ asset($receiver->image) }}"
                    alt="" />
            </div>
            <h4>
                {!! $receiver->nameWithMembership() !!}
            </h4>
        </div>
    </div>
    <div class="message-body bg-white">
        @foreach ($messages as $key => $message)
        <div @class(
            ['sender'=>$message->sender_id == auth()->id(),
            'receiver'=>$message->sender_id != auth()->id(),
            ])">
            <p>{{ $message->message }} </p>
            <br>
            <a href="{{ $message->getFirstMediaUrl('media') }}"
                target="_blank">
                <img width="200"
                    src="{{ $message->getFirstMediaUrl('media') }}"
                    alt="">
            </a>
            <span class='date'>{{ optional($message->created_at)->diffForHumans() }}</span>
        </div>
        @endforeach
    </div>
    {!! Form::open(['url' => route('frontend.message.send'),
    'method' => 'POST',
    'files' => true,]) !!}
    <div class="message-footer bg-white">
        <div class="upload">
            <input type="hidden"
                name="receiver_id"
                value="{{ request()->receiver_id }}">
            <input type="file"
                name="media" />
            <i class="fas fa-camera"></i>
            {{ __('Send a photo') }}
        </div>
        <textarea class='message-text'
            name="message"
            placeholder="{{ __('Type your message') }}"></textarea>
        <button class="btn btn main-custom-btn"
            type="submit">{{ __('Send') }}</button>

    </div>
    {!! Form::close() !!}
</div>
