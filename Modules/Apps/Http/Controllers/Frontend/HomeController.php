<?php

namespace Modules\Apps\Http\Controllers\Frontend;

use Cart;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Apps\Repositories\Dashboard\AppHomeRepository;
use Modules\Apps\Transformers\Frontend\HomeFilterResource;
use Modules\Course\Repositories\Frontend\CourseRepository;
use Modules\Catalog\Repositories\FrontEnd\ProductRepository;
use Modules\Apps\Notifications\FrontEnd\ContactUsNotification;
use Modules\Apps\Repositories\Frontend\AppHomeRepository as Home;
use Modules\Authentication\Notifications\Frontend\WelcomeNotification;


class HomeController extends Controller
{
    protected $home;
    protected $slider;
    protected $course;

    public function __construct(CourseRepository $course)
    {
        $this->course = $course;
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $this->home = new Home;
        $home_sections = $this->home->getAll($request);
        $home_sections = view('apps::frontend.home-sections.section-builder', compact('home_sections'))->render();

        return view('apps::frontend.index', compact('home_sections'));
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function filter(Request $request)
    {
        $results = HomeFilterResource::collection($this->course->autoCompleteSearch($request)->take(30)->get(['title', 'id', 'slug']))->jsonSerialize();
        $response = view('apps::frontend.components.live-search-menu', compact('results'))->render();
        return response()->json(['html' => $response]);
    }
}
