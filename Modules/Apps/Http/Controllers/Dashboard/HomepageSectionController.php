<?php

namespace Modules\Apps\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Apps\Entities\HomepageSection;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class HomepageSectionController extends Controller
{
    use CrudDashboardController  {
        CrudDashboardController::__construct as private __tConstruct;
    }


    public function __construct(HomepageSection $homepageSection)
    {
        $this->__tConstruct();
        $this->model = $homepageSection;
    }
}
