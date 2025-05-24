<?php

namespace Modules\Catalog\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Catalog\Repositories\Frontend\PodcastRepository;

class PodcastController extends Controller
{
    public function __construct()
    {
        $this->podcast = new PodcastRepository();
    }

    public function index(Request $request)
    {
        $podcasts = $this->podcast->getAll();

        return view('catalog::frontend.podcasts.index', compact('podcasts'));
    }
}
