<?php

namespace Modules\Faq\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class FaqController extends Controller
{
    use CrudDashboardController ;

    protected function view($view_name, $params = [])
    {
        return view('faq::dashboard.'. $view_name, $params) ;
    }
}
