<?php

namespace Modules\Apps\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apps\Entities\HomepageSection;
use Modules\Apps\Entities\HomepageSectionType;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class HomepageSectionTypeController extends Controller
{
    use CrudDashboardController  {
        CrudDashboardController::__construct as private __tConstruct;
    }


    public function __construct(HomepageSectionType $homepageSectionType)
    {
        $this->__tConstruct();
        $this->model = $homepageSectionType;
    }

    public function viewOrder(Request $request)
    {
        $deActiveTypes = HomepageSectionType::where('status', 0)
                            ->orderBy('order')
                            ->get();
        $activeTypes = HomepageSectionType::where('status', 1)
                            ->orderBy('order')
                            ->get();
        return view('apps::dashboard.homepagesectiontypes.order', compact('deActiveTypes', 'activeTypes'));
    }
    public function orderTypes(Request $request)
    {
        $input = $request->all();

        if (!empty($input['pending'])) {
            foreach ($input['pending'] as $key => $value) {
                $key = $key + 1;
                HomepageSectionType::where('key', $value)
                        ->update([
                            'status'=> 0,
                            'order'=>$key
                        ]);
            }
        }

        if (!empty($input['accept'])) {
            foreach ($input['accept'] as $key => $value) {
                $key = $key + 1;
                HomepageSectionType::where('key', $value)
                        ->update([
                            'status'=> 1,
                            'order'=>$key
                        ]);
            }
        }
        return response()->json(['status'=>'success']);
    }
}
