<?php

use Modules\User\ViewComposers\Dashboard\UserComposer;

// view()->composer('*', Modules\Apps\ViewComposers\Frontend\PageComposer::class);
view()->composer(['apps::dashboard.index'], UserComposer::class);

