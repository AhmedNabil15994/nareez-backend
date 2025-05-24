<div class="item d-flex align-items-center justify-content-between bg-white ">
    <div class="left-side">
        <div class="img-block">
            <img class="img-fluid"
                src="{{ asset(setting('logo')) }}"
                alt="" />
        </div>
        <h4>
            <a href="{{ route('frontend.message.index',['default_chat']) }}">
                {{ __('Mynurserykw chat') }}
            </a>
        </h4>
    </div>
    <div class="right-side">
        <span class="status online"></span>
    </div>
</div>
