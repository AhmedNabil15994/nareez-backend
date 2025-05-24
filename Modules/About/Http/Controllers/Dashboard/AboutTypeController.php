<?php

namespace Modules\About\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Modules\About\Entities\About;
use Illuminate\Routing\Controller;
use Modules\About\Entities\AboutType;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class AboutTypeController extends Controller
{
    use CrudDashboardController  {
        CrudDashboardController::__construct as private __tConstruct;
    }

    public function __construct(AboutType $aboutType)
    {
        $this->__tConstruct();
        $this->model = $aboutType;
    }

    public function viewOrder(Request $request)
    {
        $deActiveTypes = AboutType::where('status', 0)
                            ->orderBy('order')
                            ->get();
        $activeTypes = AboutType::where('status', 1)
                            ->orderBy('order')
                            ->get();
        return view('about::dashboard.abouttypes.order', compact('deActiveTypes', 'activeTypes'));
    }
    public function orderTypes(Request $request)
    {
        $input = $request->all();

        if (!empty($input['pending'])) {
            foreach ($input['pending'] as $key => $value) {
                $key = $key + 1;
                AboutType::where('key', $value)
                        ->update([
                            'status'=> 0,
                            'order'=>$key
                        ]);
            }
        }

        if (!empty($input['accept'])) {
            foreach ($input['accept'] as $key => $value) {
                $key = $key + 1;
                AboutType::where('key', $value)
                        ->update([
                            'status'=> 1,
                            'order'=>$key
                        ]);
            }
        }
        return response()->json(['status'=>'success']);
    }
}
