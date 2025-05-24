<?php

view()->composer([
    'apps::frontend.index',
    'page::frontend.about-us',
], Modules\Catalog\ViewComposers\Frontend\ClientComposer::class);
