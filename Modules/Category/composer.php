<?php

// Dashboard ViewComposr
view()->composer([
    'course::dashboard.courses.create',
    'course::dashboard.courses.edit',
    'category::dashboard.categories.*',
], \Modules\Category\ViewComposers\Dashboard\CategoryComposer::class);


view()->composer([
    'apps::frontend.layouts._header',
    'apps::frontend.layouts.header-section',
    'apps::frontend.layouts._footer',
    'apps::frontend.index',
], \Modules\Category\ViewComposers\Frontend\CategoryComposer::class);
