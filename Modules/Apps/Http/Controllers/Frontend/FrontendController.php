<?php

namespace Modules\Apps\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Apps\Entities\HomepageSectionType;
use Modules\Apps\Entities\Subscribe;
use Modules\Apps\Http\Controllers\Requests\Frontend\SubscribeRequest;
use Modules\Trainer\Entities\Trainer;

class FrontendController extends Controller
{
    public function index()
    {
        $types=HomepageSectionType::oldest('order')->with('homepageSections')->get();
        return view('apps::frontend.index', compact('types'));
    }

    public function subscribe(SubscribeRequest $request)
    {
        Subscribe::updateOrCreate([
            'email' => $request->subscribe_email,
        ], [
            'email' => $request->subscribe_email,
        ]);

        return Response()->json([true , __('apps::frontend.subscribe.alerts.subscribed_successfully')]);
    }
}
