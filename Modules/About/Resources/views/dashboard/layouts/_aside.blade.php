<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>

            <li class="nav-item {{ active_menu('home') }}">
                <a href="{{ url(route('dashboard.home')) }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ __('apps::dashboard.index.title') }}</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">{{ __('apps::dashboard._layout.aside._tabs.roles_permissions') }}</h3>
            </li>

            @can('show_roles')
            <li class="nav-item {{ active_menu('roles') }}">
                <a href="{{ url(route('dashboard.roles.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.roles') }}</span>
                </a>
            </li>
            @endcan
            @canany( $usersPermissions= ['show_users','show_admins','show_trainers'] )
            <li class="nav-item  {{active_slide_menu($usersPermissions)}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-pointer"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside._tabs.users')}}</span>
                    <span class="arrow {{active_slide_menu(['users','admins','trainers'])}}"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">

                    @can('show_users')
                    <li class="nav-item {{ active_menu('users') }}">
                        <a href="{{ url(route('dashboard.users.index')) }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.users') }}</span>
                        </a>
                    </li>
                    @endcan
                    @can('show_admins')
                    <li class="nav-item {{ active_menu('admins') }}">
                        <a href="{{ url(route('dashboard.admins.index')) }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.admins') }}</span>
                        </a>
                    </li>
                    @endcan
                    @can('show_trainers')
                    <li class="nav-item {{ active_menu('trainers') }}">
                        <a href="{{ url(route('dashboard.trainers.index')) }}" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.trainers') }}</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            <li class="heading">
                <h3 class="uppercase">{{ __('apps::dashboard._layout.aside._tabs.catalog') }}</h3>
            </li>




            @canany(['show_exams','show_questions'])
            <li class="nav-item  {{active_slide_menu(['exams','questions'])}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-pointer"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.exams') }}</span>
                    <span class="arrow {{active_slide_menu(['exams','questions'])}}"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item {{ active_menu('exams') }}">
                        <a href="{{ route('dashboard.exams.index') }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.exams') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_menu('questions') }}">
                        <a href="{{ route('dashboard.questions.index') }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.questions') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @canany($coursesPermissions=['show_courses', 'show_lessons','show_lessoncontents','show_levels'])
            <li class="nav-item  {{active_slide_menu($coursesPermissions)}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-pointer"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.courses')}}</span>
                    <span class="arrow {{active_slide_menu(['courses','lessons','levels','lessoncontents'])}}"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item {{ active_menu('courses') }}">
                        <a href="{{ route('dashboard.courses.index') }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.courses') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>


                    <li class="nav-item {{ active_menu('lessons') }}">
                        <a href="{{ route('dashboard.lessons.index') }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.lessons') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item {{ active_menu('lessoncontents') }}">
                        <a href="{{ route('dashboard.lessoncontents.index') }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.lesson_contents') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_menu('level') }}">
                        <a href="{{ route('dashboard.levels.index') }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.levels') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                </ul>
            </li>
            @endcan

            @can('show_orders')
            <li class="nav-item {{ active_menu('orders') == 'active' && !request('status_id') ? 'active' : ''  }}">
                <a href="{{ url(route('dashboard.orders.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.orders') }}</span>
                </a>
            </li>
            <li class="nav-item {{ active_menu('orders') == 'active' && request('status_id') ? 'active' : '' }}">
                <a href="{{ url(route('dashboard.orders.index' , ['status_id'=>'2'])) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.success_orders') }}</span>
                </a>
            </li>
            @endcan




            @can('show_faqs')
            <li class="nav-item {{ active_menu('faqs') }}">
                <a href="{{ url(route('dashboard.faqs.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.faqs') }}</span>
                </a>
            </li>
            @endcan

            @can('show_blogs')
            <li class="nav-item {{ active_menu('blogs') }}">
                <a href="{{ url(route('dashboard.blogs.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.blogs') }}</span>
                </a>
            </li>
            @endcan

            {{-- @can('show_podcasts')
            <li class="nav-item {{ active_menu('podcasts') }}">
                <a href="{{ url(route('dashboard.podcasts.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.podcasts') }}</span>
                </a>
            </li>
            @endcan --}}

            {{-- @can('show_clients')
            <li class="nav-item {{ active_menu('clients') }}">
                <a href="{{ url(route('dashboard.clients.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.clients') }}</span>
                </a>
            </li>
            @endcan --}}

{{--
            @can('show_categories')
            <li class="nav-item {{ active_menu('categories') }}">
                <a href="{{ url(route('dashboard.categories.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.categories') }}</span>
                </a>
            </li>
            @endcan --}}

            {{-- @can('show_services')
            <li class="nav-item {{ active_menu('services') }}">
                <a href="{{ url(route('dashboard.services.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.services') }}</span>
                </a>
            </li>
            @endcan --}}

            <li class="heading">
                <h3 class="uppercase">{{ __('apps::dashboard._layout.aside._tabs.other') }}</h3>
            </li>


            @canany(['show_homepage_section_types','show_homepage_sections'])
            <li class="nav-item  {{active_slide_menu(['homepagesections','homepagesectiontypes'])}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-pointer"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.homepagesection') }}</span>
                    <span class="arrow {{active_slide_menu(['homepagesections','homepagesectiontypes'])}}"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item {{ active_menu('homepagesections') }}">
                        <a href="{{ url(route('dashboard.homepagesections.index')) }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.homepagesection') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item {{ active_menu('homepagesectiontypes') }}">
                        <a href="{{ url(route('dashboard.homepagesectiontypes.index')) }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.homepagesectiontypes') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>


                </ul>
            </li>
            @endcan

            @can('show_sliders')
            <li class="nav-item {{ active_menu('sliders') }}">
                <a href="{{ url(route('dashboard.sliders.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.sliders') }}</span>
                </a>
            </li>
            @endcan




            @canany(['show_countries','show_areas','show_cities','show_states'])
            <li class="nav-item  {{active_slide_menu(['countries','cities','states','areas'])}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-pointer"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.countries') }}</span>
                    <span class="arrow {{active_slide_menu(['countries','governorates','cities','regions'])}}"></span>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item {{ active_menu('countries') }}">
                        <a href="{{ url(route('dashboard.countries.index')) }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.countries') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item {{ active_menu('cities') }}">
                        <a href="{{ url(route('dashboard.cities.index')) }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.cities') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item {{ active_menu('states') }}">
                        <a href="{{ url(route('dashboard.states.index')) }}" class="nav-link nav-toggle">
                            <i class="fa fa-building"></i>
                            <span class="title">{{ __('apps::dashboard._layout.aside.state') }}</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan



            @can('show_pages')
            <li class="nav-item {{ active_menu('pages') }}">
                <a href="{{ url(route('dashboard.pages.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.pages') }}</span>
                </a>
            </li>
            @endcan
            @can('show_subscribes')
            <li class="nav-item {{ active_menu('subscribe') }}">
                <a href="{{ url(route('dashboard.subscribe.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.subscriptions') }}</span>
                </a>
            </li>
            @endcan

            @can('show_testimonials')
            <li class="nav-item {{ active_menu('testimonials') }}">
                <a href="{{ url(route('dashboard.testimonials.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.testimonials') }}</span>
                </a>
            </li>
            @endcan

            @can('edit_settings')
            <li class="nav-item {{ active_menu('setting') }}">
                <a href="{{ url(route('dashboard.setting.index')) }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">{{ __('apps::dashboard._layout.aside.setting') }}</span>
                </a>
            </li>
            @endcan

            {{-- @can('show_telescope')
            <li class="nav-item {{ active_menu('telescope') }}">
            <a href="{{ url(route('telescope')) }}" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">{{ __('apps::dashboard._layout.aside.telescope') }}</span>
            </a>
            </li>
            @endcan --}}
        </ul>
    </div>

</div>
