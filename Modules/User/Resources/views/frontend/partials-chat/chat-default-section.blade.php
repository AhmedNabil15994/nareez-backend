<div class="col-md-7">
    <div class="message-block">
        <div class="m-head d-flex bg-white align-items-center">
            <div class="img-block">
                <img class="img-fluid"
                    src="{{ asset(setting('logo')) }}"
                    alt="" />
            </div>
            <h4>
                {{ __('Mynurserykw chat') }}
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

</div>
