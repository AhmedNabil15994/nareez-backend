<?php

namespace Modules\Faq\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class FaqController extends Controller
{
    public function index()
    {
        return view('faq::frontend.faqs.index');
    }
}
