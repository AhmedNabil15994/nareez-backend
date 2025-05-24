<form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a class="{{active_profile('frontend.profile.index')}}" href="{{ url(route('frontend.profile.index')) }}">
    <i class="lnr lnr-user"></i><span> {{ __('user::frontend.show.details') }}</span>
</a>
<a class="{{ active_profile('frontend.profile.courses') }}" href="{{ url(route('frontend.profile.courses')) }}">
    <i class="lnr lnr-layers"></i> <span>{{ __('user::frontend.show.my_courses') }}</span>
</a>
<a class="{{ active_profile('frontend.profile.orders') }}" href="{{ url(route('frontend.profile.orders')) }}">
    <i class="lnr lnr-layers"></i> <span>{{ __('user::frontend.show.my-orders') }}</span>
</a>
<a href="{{ url(route('frontend.cart.index')) }}"><i class="lnr lnr-cart"></i> <span>{{ __('user::frontend.show.cart') }}</span></a>

<a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    <i class="lnr lnr-exit"></i> <span>{{ __('user::frontend.show.logout') }}</span>
</a>
