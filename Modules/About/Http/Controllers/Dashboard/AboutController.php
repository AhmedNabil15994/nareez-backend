<?php

namespace Modules\About\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\About\Entities\About;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class AboutController extends Controller
{
    use CrudDashboardController  {
        CrudDashboardController::__construct as private __tConstruct;
    }


    public function __construct(About $about)
    {
        $this->__tConstruct();
        $this->model = $about;
    }
}
