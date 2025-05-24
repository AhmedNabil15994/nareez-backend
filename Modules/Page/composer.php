<?php

view()->composer(['setting::dashboard.index'], \Modules\Page\ViewComposers\Dashboard\PageComposer::class);


view()->composer([
    // 'apps::frontend.index',
    'apps::frontend.layouts.footer-section',
    'apps::frontend.layouts.header-section',
], \Modules\Page\ViewComposers\Frontend\PageComposer::class);
