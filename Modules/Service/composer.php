<?php

// Dashboard ViewComposr

view()->composer([
    'apps::frontend.index',
], \Modules\Service\ViewComposers\Frontend\ServiceComposer::class);
