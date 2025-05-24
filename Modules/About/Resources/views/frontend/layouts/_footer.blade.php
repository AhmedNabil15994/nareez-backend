<footer>
  <img src="{{ asset('frontend/images/shape-5.svg') }}"
    alt="shape"
    class="bottom-shape img-fluid">
  <div class="container">
    <a class="footer-logo text-center d-block"
      href="{{ route('frontend.home') }}">
      <img src="{{ setting('logo') ? asset(setting('logo')) : url('frontend/images/header-logo.png') }}"
        class="img-fluid"
        alt="" />
    </a>
    <div class="row">
      <div class="col-md-3 col-7">
        <h4> {{ __('apps::frontend.navbar.contactus') }}</h4>
        <ul class="contact-det">
          <li><i class="ti-email"></i> {{ setting('contact_us','email') }}</li>
          <li><i class="ti-mobile"></i> {{ setting('contact_us','call_number') }} </li>
        </ul>
        <div class="social-links">
          <a href="{{setting('social','facebook') ? setting('social','facebook') : '#.'}}"><i class="fab fa-facebook-f"></i></a>
          <a href="{{setting('social','twitter') ? setting('social','twitter') : '#.'}}"><i class="fab fa-twitter"></i></a>
          <a href="{{setting('social','youtube') ? setting('social','youtube') : '#.'}}"><i class="fab fa-youtube"></i></a>
          <a href="{{setting('social','instagram') ? setting('social','instagram') : '#.'}}"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-md-3 col-7">
        {{-- <h4>
          {{ __('apps::frontend.quick_links') }}

        </h4> --}}
        <ul class="footer-links">
          <li><a href="{{ route('frontend.aboutUs.view') }}">{{ __('apps::frontend.about_raed') }}</a></li>


          @if(setting('other','registration_terms'))
          <li>
            <a href="{{ route('frontend.pages.show',['page'=>setting('other','registration_terms')]) }}">
              {{ __('apps::frontend.pages.registration_terms') }}
            </a>
          </li>
          @endif


          <li><a href="{{ route('frontend.levels.index') }}">{{ __('apps::frontend.navbar.levels') }}</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-7">
        <h4>{{ __('apps::frontend.pages.terms_of_use') }}</h4>
        <ul class="footer-links">
          @if(setting('other','terms_of_use'))
          <li>
            <a href="{{ route('frontend.pages.show',['page'=>setting('other','terms_of_use')]) }}">
              {{ __('apps::frontend.pages.terms_of_use') }}
            </a>
          </li>
          @endif
          @if(setting('other','refund_policy'))
          <li>
            <a href="{{ route('frontend.pages.show',['page'=>setting('other','refund_policy')]) }}">
              {{ __('apps::frontend.pages.refund_policy') }}
            </a>
          </li>
          @endif
          <li><a href="{{ route('frontend.contactus.view') }}">{{ __('apps::frontend.navbar.contactus') }}</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-7">
        <h4>{{ __('apps::frontend.pages.important_links') }}</h4>
        <ul class="footer-links">
          @if(setting('other','terms'))
          <li>
            <a href="{{ route('frontend.pages.show',['page'=>setting('other','terms')]) }}">
              {{ __('apps::frontend.pages.terms') }}
            </a>
          </li>
          @endif
          @if(setting('other','privacy_policy'))
          <li>
            <a href="{{ route('frontend.pages.show',['page'=>setting('other','privacy_policy')]) }}"> {{ __('apps::frontend.pages.privacy_policy') }}
            </a>
          </li>
          @endif
          <li><a href="{{ route('frontend.faqs.index') }}"> @lang('apps::frontend.navbar.faqs')</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="copyrights text-center">
    <span></span>
  </div>
  <div class="copyrights text-center">
    <span class="mb-0">{{ __('apps::frontend.footer.copy_right') }}</span>
  </div>
</footer>
