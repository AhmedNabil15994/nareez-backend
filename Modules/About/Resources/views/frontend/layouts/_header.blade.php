<header class="header-area" id="header-area">
  <div class="container">
    <div class="d-flex align-items-center top-header">
      <div class="site-logo"><a href="index.php"><img src="/frontend/images/logo.png" class="img-fluid" alt="Img" /></a></div>
      <button class="res-user-menu"><img class="img-fluid" src="/frontend/images/avatar-woman.png" alt=""></button>
      <a class="res-child" href="index.php?page=children"><i class="lnr lnr-users"></i></a>
      <button class="res-menu"><img class="img-fluid" src="/frontend/images/menu-button.png" alt=""></button>

      <div class="header-search">
        <form class="d-flex">
          <input type="text" placeholder="ما الذي تبحث عنه.." />
          <button type="submit"><i class="ti-search"></i></button>
        </form>
      </div>
      <div class="user-header d-flex align-items-center">
        @auth
        <a class="child-btn" href="index.php?page=children"><i class="lnr lnr-users"></i> <span>الطلاب المسجلين</span></a>
        <div>
          <a class="dropdown-toggle d-flex align-items-center" href="#" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="img-block"><img class="img-fluid" src="/frontend/images/avatar-woman.png" alt="" /></span> <span class="user-nme">{!!
              auth()->user()->nameWithMembership() !!} </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

            <a class="{{active_profile('frontend.profile.index')}}" href="{{ route('frontend.profile.index') }}">
              <i class="lnr lnr-user"></i><span> </span>
            </a>

            <a class="dropdown-item" href="{{ url(route('frontend.profile.index')) }}"><i class="ti-settings"></i> {{ __('user::frontend.show.details') }}</a>
            <a class="dropdown-item" href="index.php?page=purchase-course"><i class="ti-receipt"></i> المستويات المدفوعة</a>
            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ti-power-off"></i> {{
              __('user::frontend.show.logout') }}</a>
            <form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </div>
        @else
        <a class="child-btn" href="{{ route('frontend.auth.login') }}"><i class="lnr lnr-users"></i> <span>{{ __('apps::frontend.navbar.login') }}</span></a>
        @endauth

      </div>


    </div>
    <div class="header-menu">
      <div class="close-menu"><i class="ti-close"></i></div>
      <div class="menu-links">
        <a href="{{route('frontend.home')}}">
          {{ __('apps::frontend.navbar.home') }}
        </a>

        <a href="{{ route('frontend.aboutUs.view') }}">
          {{ __('apps::frontend.navbar.about_us') }}
        </a>
        @guest
        <a href="{{ route('frontend.auth.register') }}">{{ __('apps::frontend.navbar.register') }}</a>
        @endguest

        <a href="{{ route('frontend.levels.index') }}">{{ __('apps::frontend.navbar.levels') }}</a>
        <a href="{{ route('frontend.faqs.index') }}">{{ __('apps::frontend.navbar.faqs') }}</a>
        <a href="{{ route('frontend.contactus') }}">
          {{ __('apps::frontend.navbar.contactus') }}
        </a>
      </div>
      <div class="language-select">
        <i class="ti-world"></i>
        <select class="nice-select" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
          <option {{ is_rtl()=='rtl' ? 'selected' :''}} value="/ar">اللغة العربية </option>
          <option {{ is_rtl() !='rtl' ? 'selected' :''}} value="/en">اللغة الانجليزية</option>
        </select>
      </div>
    </div>
  </div>
</header>

<div class="user-menu responsive-case">
  <div class="tutor-avatar-block">
    <div class="close-menu"><i class="ti-close"></i></div>
    <div class="d-flex align-items-center tutor-logout">
      <span class="flex-1">{{ __('user::frontend.show.logout') }}</span>
      <button onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i></button>

      <form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>



    </div>
    <div class="avatar-blk text-center">
      <img class="img-fluid" src="/frontend/images/avatar-woman.png" alt="">
      <span class="active-status online"></span>
    </div>
    <div class="tutor-blk-content text-center">
      <h2>مروة المناوي</h2>
      <p>عضو منذ 12 ربيع الاول</p>
      <a href="index.php?page=account-settings"><i class="ti-pencil"></i> تعديل الحساب</a>
    </div>
  </div>
  <div class="widget accordion" id="accordionExample">
    <div class="widget-head d-flex align-items-center" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapseOne">
      <h4><img class="img-fluid" src="/frontend/images/icon-13.png" alt=""> المقررات الدراسية</h4>
    </div>
    <div class="widget-content collapse show" id="collapse1" aria-labelledby="heading1" data-parent="#accordionExample">
      <ul class="course-list">
        <li class="course-complete">
          <a href="index.php?page=course">
            <h5> <i class="fas fa-check"></i> المستوى الأول - العقيدة</h5>
            <p>14 محاضرات</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="widget">
    <div class="widget-head d-flex align-items-center">
      <a href="index.php?page=levels-orders"><img class="img-fluid" src="/frontend/images/icon-14.png" alt=""> المستويات المدفوعة</a>
    </div>
  </div>
</div>
