@if( setting('top_footer'))
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-12 footer-logo-icon">
        <img class="footer-logo" src="{{ asset(setting('logo')) ?? url('frontend/images/header-logo.png') }}" />

        <div class="links">
          <ul>
            <li> {{ setting('app_name',locale()) }}</li>
            <li style="font-size: 22px">أكاديمية ناريز</li>
            <li style="font-size: 11px">
              للعطور والبخور ومواد التجميل
            </li>
          </ul>
        </div>
        <div class="links">
          <ul>
            @if(setting('contact_us','address'))
            <li>{{ setting('contact_us','address') }}</li>
            @endif
          </ul>
        </div>
        @if( setting('footer_social_media'))
        <div class="footer-social">
          @if(!setting('social','facebook') || setting('social','facebook') != '#')
          <a href="{{setting('social','facebook')}}" class="social-icon"><i class="ti-facebook"></i></a>
          @endif
          @if(!setting('social','instagram') || setting('social','instagram') != '#')
          <a href="{{setting('social','instagram')}}" class="social-icon"><i class="ti-instagram"></i></a>
          @endif
          @if(!setting('social','linkedin') || setting('social','linkedin') != '#')
          <a href="{{setting('social','linkedin')}}" class="social-icon"><i class="ti-linkedin"></i></a>
          @endif
          @if(!setting('social','twitter') || setting('social','twitter') != '#')
          <a href="{{setting('social','twitter')}}" class="social-icon"><i class="ti-twitter-alt"></i></a>
          @endif
        </div>
        @endif
      </div>
      <div class="col-md-2 col-6">
        <h3 class="title-of-footer"> {{ __('apps::frontend.master.important_links') }}</h3>
        <div class="links">
          <ul>
            <li><a href="{{ route('frontend.home') }}">{{ __('apps::frontend.master.home') }}</a></li>
            @if($aboutUs)
            <li>
              <a href="{{ $aboutUs ? route('frontend.pages.show', $aboutUs->slug) : '#' }}">{{ __('apps::frontend.master.about_us') }}</a>
            </li>
            @endif

            @if($terms)
            <li>
              <a href="{{ $terms ? route('frontend.pages.show', $terms->slug) : '#' }}">{{ __('apps::frontend.Terms & Conditions') }}</a>
            </li>
            @endif
            @if($privacyPage)
            <li>
              <a href="{{ $privacyPage ? route('frontend.pages.show', $privacyPage->slug) : '#' }}">{{ __('apps::frontend.Privacy & Policy') }}</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-6">
        <div class="links">
          <ul>
            @if($faqs)
            <li>
              <a href="{{ $faqs ? route('frontend.pages.show', $faqs->slug) : '#' }}">{{ __('Faqs') }}</a>
            </li>
            @endif
            <li>
              <a href="{{ route('frontend.faqs.index') }}"></a>
            </li>

            <li>
              <a href="{{ route('frontend.courses') }}">{{ __('courses') }}</a>
            </li>
            @guest()
            <li>
              <a href="{{ route('frontend.auth.login') }}"> {{ __('apps::frontend.Login') }}</a>
            </li>
            @endguest
            <li>
              <a href="{{ route('frontend.contactus.view') }}">{{ __('apps::frontend.master.contact_us') }}</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-4 col-12 footer-subscribe">
        <div class="subscribe-form py-2">
          <h3 class="title-of-footer " style="margin-bottom: 8px;">{{ __('Download our app') }}</h3>
          <div class="pay-men">
            {{-- <div class=" d-flex justify-content-center flex-wrap row"> --}}
              @php
              $payments=[
              'google_play' =>asset('frontend/images/google.svg') ,
              'app_store' =>asset('frontend/images/apple.svg'),
              'app_gallery' =>asset('frontend/images/appgallery.png'),
              ]
              @endphp
              <ul>
                @foreach($payments as $key=>$value)
                <li class="px-2">
                  <a class="download-btn" href="{{setting('app_links',$key)}}">
                    <img width="70" src="{{  $value }}" alt="">
                  </a>
                </li>
                @endforeach
              </ul>
            </div>

          </div>
          <h3 class="title-of-footer">{{__('apps::frontend.Payment Method')}}</h3>
          <div class="pay-men">
            {{-- <div class=" d-flex justify-content-center flex-wrap row"> --}}
              @php
              $payments=[
              asset('frontend/payment-images/1.png'),
              asset('frontend/payment-images/2.png'),
              asset('frontend/payment-images/3.png'),
              asset('frontend/payment-images/4.png'),
              asset('frontend/payment-images/5.png'),
              ]
              @endphp
              <ul>
                @foreach($payments as $value)
                <li class="px-2">
                  <a class="download-btn" href="#">
                    <img class="img-fluid" style="max-height: 112px;" src="{{  $value }}" alt="">
                  </a>
                </li>
                @endforeach
              </ul>
              {{--
            </div> --}}
          </div>
        </div>
      </div>
    </div>
</footer>
@endif

@if(setting('bottom_footer'))
<div class="footer-copyright text-center">
  <p>
    @lang("apps::frontend.footer.copyrights",['site_name'=>setting('app_name',locale())]) &copy; {{date("Y")}} -
    @lang("apps::frontend.footer.developed_by")
    <a href="https://www.tocaan.com/" target="_blank">{{ __('tocaan') }}</a>
  </p>
</div>
@endif


<style>
  .pay-men ul {
    display: flex;
  }

</style>
