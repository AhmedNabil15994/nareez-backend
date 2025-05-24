<header class="site-header header-option">
  @if(setting('top_header'))
  <div class="header-top">
    <div class="container">
      <div class="topp">
        @if(setting('contact_us','mobile'))
        <ul class="header-top-left">
          <li><a href="https://wa.me/{{ setting('contact_us','mobile') }}">
              {{__('apps::frontend.Contact Us')}}: {{ setting('contact_us','mobile') }}
            </a>
          </li>
        </ul>
        @endif
        <ul class="header-top-left">
          <li>
            @auth()
            <a href="{{route('frontend.profile.index')}}">
              <i class="fa fa-user"></i>
              <span>{{ __('View Profile') }}</span>
            </a>
            <a class="mx-2" href="{{route('frontend.profile.courses')}}">
              <span>{{ __('My Courses') }}</span>
            </a>
            @else
            <a href="{{route('frontend.auth.login')}}">
              <i class="fa fa-sign-in"></i>
              <span>{{__('apps::frontend.Sign In')}}</span>
            </a>
            @endauth
          </li>
          <li class="menu-item-has-children">
            <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL((locale() == 'en' ?'ar' : 'en'), null, [], true) }}">
              {{locale() == 'en' ? 'عربي' : 'English'}}
            </a>
          </li>
        </ul>
        <ul class="header-top-right">
          <li>
            <div class="block-minicart dropdown">
              <a class="minicart d-flex align-items-center" href="{{ route('frontend.cart.index') }}">
                <span class="counter qty">
                  <span class="cart-icon"><i class="ti-shopping-cart-full"></i></span>
                  <span class="counter-number" id="cartIcon" style="display:{{count(Cart::getContent()) > 0 ? 'block' : 'none'}}">
                    <span class="cat-count" id="cartPrdCount">
                      @if (count(Cart::getContent()) > 0)
                      {{ count(Cart::getContent()) }}
                      @endif
                    </span>
                  </span>
                </span>
                <span class="counter-your-cart">
                  <span class="counter-price cartPrdTotal">
                    {{Cart::getSubTotal() .'kwd'}}
                  </span>
                </span>
              </a>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>
  @endif

  @if(setting('middle_header'))
  <div class="header-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-4">
          <div class="logo-header">
            <a href="{{ route('frontend.home') }}">
              <img src="{{ setting('logo') ? asset(setting('logo')) : asset('frontend/images/header-logo.png') }}" alt="logo">
              {{ setting('app_name',locale()) }}
            </a>

          </div>
        </div>
        <div class="col-lg-8 col-md-6 d-re-no">
          <div class="block-search">
            <form method="get" action="{{route('frontend.courses')}}" class="form-search">
              <div class="form-content">
                <div class="search-input">
                  <input type="text" class="input" {{-- onkeyup="showResult(this.value,'{{route('frontend.home.filter')}}')" --}} autocomplete="off"
                    placeholder="{{__('apps::frontend.Search for a course')}}" name="s" value="{{request('s')}}">
                  <i class="ti-search"></i>
                </div>
                <div class="xdsoft_autocomplete" style="display: inline-block; width: 473px;">
                  <div id="livesearch" class="xdsoft_autocomplete_dropdown" style="top: -13px;"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-8 header-cart mt-30">
          <button class="res-searc-icon">
            <i class="ti-search"></i>
          </button>
          <div class="block-minicart dropdown">
            <a class="minicart d-flex align-items-center" href="{{ route('frontend.home') }}">
              <ul>
                <li style="font-size: 22px">أكاديمية ناريز</li>
                <li style="font-size: 11px">
                  للعطور والبخور ومواد التجميل
                </li>
              </ul>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  @if(setting('bottom_header'))
  <div class="header-menu-nar">
    <div class="container">
      <div class="header-menu">
        <ul class="header-nav">
          <li class="btn-close hidden-mobile"><i class="fa fa-times" aria-hidden="true"></i></li>
          <li>
            <a href="{{ route('frontend.home') }}">{{ __('apps::frontend.master.home') }}</a>
          </li>
          @if(count($mainCategories) > 0)
          <li class="menu-item menu-item-has-children arrow">
            <a href="" class="dropdown-toggle"> {{__('apps::frontend.Categories')}} <i class="fa fa-angle-down"></i></a>
            <span class="toggle-submenu hidden-mobile"></span>
            <ul class="submenu dropdown-menu">
              @foreach($mainCategories as $k => $category)
              @php $childrenCount = count($category->children); @endphp





              <li class="menu-item {{$childrenCount ? 'menu-item-has-children arrowleft': ''}}">
                <a href="{{route('frontend.courses', ['category_id' => $category->id])}}" class="{{$childrenCount?'dropdown-toggle':''}}">
                  {{ $category->title }}
                </a>
                @if($childrenCount)
                <span class="toggle-submenu hidden-mobile"></span>
                @include('apps::frontend.layouts._nested_categories', ['children' =>
                $category->children])
                @endif
              </li>
              @endforeach
            </ul>
          </li>
          @endif
          @if($aboutUs)
          <li>
            <a href="{{ $aboutUs ? route('frontend.pages.show', $aboutUs->slug) : '#' }}">{{ __('apps::frontend.master.about_us') }}</a>
          </li>
          @endif
          <li>
            <a href="{{ route('frontend.contactus.view') }}"> {{ __('apps::frontend.master.contact_us') }} </a>
          </li>
        </ul>
      </div>
      <span data-action="toggle-nav" class="menu-on-mobile hidden-mobile">
        <span class="btn-open-mobile home-page">
          <span></span>
          <span></span>
          <span></span>
        </span>
        Menu
      </span>
    </div>
  </div>
  @endif
</header>
