<div class="header-inner">
  <div class="header-top">
    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <div class="header-logo">
          <a class="my-logo"
            href="{{ route('frontend.home') }}">
            <img class="img-fluid"
              style="min-height:60px"
              src="{{asset(setting('logo'))}}"
              alt="" /></a>
        </div>
        <div>
          <button class="open-search"><i class="ti-search"></i></button>
          <button class="responsive-menu"><i class="ti-align-justify"></i></button>
        </div>
        <div class="header-search">
          <button class="close-search"><i class="ti-close"></i></button>
          <form class="d-flex"
            action="{{ route('frontend.courses') }}">
            <button type="submit"><i class="ti-search"></i></button>
            <input type="text"
              name="search"
              placeholder="{{ __('What are you looking for?') }}" />
          </form>
        </div>
        <div class="user-header">
          <ul>
            {{-- <li> <a href="index.php?page=messages"><i class="fas fa-envelope"></i></a></li> --}}
            @guest
            <li> <a href="{{ route('frontend.auth.login') }}"><i class="fas fa-sign-in-alt"></i></a></li>
            @endguest
            @auth
            <li>
              <a href="{{ route('frontend.cart.index') }}"><i class="fas fa-shopping-cart"></i>
                @if (count(Cart::getContent()) > 0)
                <span class="cart-count">{{ count(Cart::getContent()) }}</span>
                @endif
              </a>
            </li>
            <li>
              <a class="dropdown-toggle"
                href="#"
                id="dropdownMenuButton2"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu user-dropdown"
                aria-labelledby="dropdownMenuButton2">
                <div class="head">
                  <span class="img-block"> <i class="fas fa-user"></i></span>
                  <span class="user-nme">
                    {!! auth()->user()->nameWithMembership() !!}
                    <span class="text-muted">{{ auth()->user()->email }}</span>
                  </span>
                </div>
                <a class="dropdown-item"
                  href="{{ route('frontend.profile.index') }}">
                  {{ __('Edit Profile') }} </a>
                <a class="dropdown-item"
                  href="{{ route('frontend.profile.courses') }}">
                  {{ __('My courses') }}</a>
                {{-- <a class="dropdown-item"
                  href="{{ route('frontend.calender') }}">
                  {{ __('Calender') }}
                </a> --}}
                {{-- <a class="dropdown-item"
                  href="{{ route('frontend.message.index') }}">
                  {{ __('Chat') }}</a> --}}

                <a class="dropdown-item signout"
                  href="#"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Sign Out') }}</a>

                <form id="logout-form"
                  action="{{ route('frontend.auth.logout') }}"
                  method="POST"
                  style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            @endauth
            <li>
              <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                class="selectpicker select-language">
                <option value="/ar"
                  data-content="<img class='flag' src='{{ asset('frontend/images/flags/kw.svg') }}'> العربية"
                  {{
                  locale()=='ar'
                  ? 'selected'
                  : ''
                  }}></option>
                <option value="/en"
                  {{
                  locale()=='en'
                  ? 'selected'
                  : ''
                  }}
                  data-content="<img class='flag' src='{{ asset('frontend/images/flags/gb.svg') }}'> English">
                </option>
              </select>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <nav class="navbar">
    <div class="container">
      <div class="navbar-collapse">
        <span class="menu-close d-block text-center"><i class="ti-close"></i></span>
        <ul class="nav navbar-nav">
          <li @class(active_profile('frontend.home'))><a href="{{ route('frontend.home') }}">{{ __('Home')
              }}</a>
          </li>
          <li @class(active_profile('frontend.courses'))>
            <a href="#"> {{ __('Courses') }}<i class="ti-angle-down"></i></a>
            <ul class="dropdown">
              <li>
                @foreach ($mainCategories as $key => $category)
                <a href="{{ route('frontend.courses', ['category_id' => $category->id]) }}">{{ $category->title }}
                </a>
                @endforeach
              </li>
            </ul>
          </li>

          <li @class(active_profile('frontend.trainers.index'))><a href="{{ route('frontend.trainers.index') }}">{{ __('Our Team') }}</a></li>


          <li @class(active_profile('frontend.pages.show'))><a href="{{ $about_us_page ? url(route('frontend.pages.show', $about_us_page['slug'])) : '#' }}">{{
              __('About Us') }}</a>
          </li>


          <li @class(active_profile('frontend.blogs.index'))>
            <a href="{{ route('frontend.blogs.index') }}">
              {{ __('Blogs') }}
            </a>
          </li>
          <li @class(active_profile('frontend.contactus.view'))>
            <a href="{{ route('frontend.contactus.view') }}">
              {{ __('Contact Us') }}
            </a>
          </li>
          {{-- <li @class(active_profile('frontend.trainers.apply.form'))><a href="{{ route('frontend.trainers.apply.form') }}">{{ __('Become Instructor')
              }}</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>

</div>
