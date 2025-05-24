<?php

namespace Modules\About\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Notification;
use Modules\About\Entities\AboutType;
use Modules\Apps\Notifications\FrontEnd\ContactUsNotification;
use Modules\Apps\Http\Controllers\Requests\Frontend\ContactUsRequest;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $types=AboutType::oldest('order')->with('sections')->get();


        return view('about::frontend.index', compact('types'));
    }
}
