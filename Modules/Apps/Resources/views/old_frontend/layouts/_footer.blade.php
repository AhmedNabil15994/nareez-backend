{{-- <section class="subscribe">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h2>
        {!! __('Specialized English courses <br> for your learning needs') !!}
      </h2>
      @guest

      <a href="{{ route('frontend.auth.register') }}"
        class="btn btn main-custom-btn">{{ __('Register Now') }}</a>
      @endguest
    </div>

  </div>
</section> --}}
<footer class="footer">
  <div class="container">
    <div class="footer-inner">
      <div class="row d-flex align-items-center">
        <div class="col-md-3 col-sm-6 col-12 footer-logo-icon">
          <img class="footer-logo"
            src="{{ asset(setting('footer_logo')) }}" />
        </div>
        <div class="col-md-2 col-6">
          <div class="links">
            <ul>
              <li>
                <a href="{{ route('frontend.home') }}"> {{ __('Home') }} </a>
              </li>
              <li>
                <a href="{{ route('frontend.courses') }}"> {{ __('Courses') }}</a>
              </li>
              {{-- <li>
                <a href="{{ route('frontend.exams.index') }}">
                  {{ __('Test Your Levels') }}
                </a>
              </li> --}}
              {{-- <li>
                <a href="{{ route('frontend.trainers.apply.form') }}">
                  {{ __('Become Instructor') }}
                </a>
              </li> --}}
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-6">
          <div class="links">
            <ul>






              <li><a href="{{ $about_us_page ?
                 url(route('frontend.pages.show', $about_us_page['slug'])) : '#' }}">
                  {{ __('About Us') }}
                </a></li>

              {{-- <li><a href="index.php?page=team"> {{ __('Our Team') }}</a></li> --}}
              {{-- <li><a href="{{ route('frontend.services.apply.form') }}"> {{ __('Writing & Translation') }}</a></li> --}}
              <li><a href="{{ route('frontend.auth.register') }}"> {{ __('Sign Up') }}</a></li>
            </ul>

          </div>
        </div>
        <div class="col-md-2 col-6">
          <div class="links">
            <ul>
              <li><a href="index.php?page=blog"> {{ __('Contact Us') }}</a></li>

              <li>
                <a href="{{$privacy_policy ? url(route('frontend.pages.show',$privacy_policy['slug'])) : '#'}}">
                  {{__('Terms & Condition')}}
                </a>
              </li>

              <li><a href="{{ route('frontend.faqs.index') }}">{{ __('Faqs') }}</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-12 footer-subscribe">
          <div class="payment-icons">
            <img class="img-fluid"
              src="{{ asset('frontend/images/payments.svg') }}"
              alt="" />
          </div>
          <div class="footer-social">
            <a href="{{setting('social','facebook') ? setting('social','facebook') : '#.' }}"
              class="social-icon">
              <i class="ti-facebook"></i>
            </a>
            <a href="{{setting('social','instagram') ? setting('social','instagram') : '#.'}}"
              class="social-icon"><i class="ti-instagram"></i></a>
            <a href="{{setting('social','linkedin') ? setting('social','linkedin') : '#.'}}"
              class="social-icon"><i class="ti-linkedin"></i></a>
            <a href="{{setting('social','twitter') ? setting('social','twitter') : '#.'}}"
              class="social-icon"><i class="ti-twitter-alt"></i></a>
          </div>
          {{-- <span class="website-views"><i class="fas fa-eye"></i> 278695</span> --}}
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="footer-copyright text-center">
  <p class="mb-0">
    @lang("apps::frontend.copyrights") &copy; {{date("Y")}} -
    @lang("apps::frontend.developed_by")
    <a href="https://www.tocaan.com/"
      target="_blank">{{ __('tocaan') }}</a>
  </p>
</div>
