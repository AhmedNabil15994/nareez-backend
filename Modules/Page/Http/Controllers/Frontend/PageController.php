<?php

namespace Modules\Page\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;
use Modules\Page\Repositories\Frontend\PageRepository as Page;
use Modules\Page\Transformers\Frontend\PageResource;

class PageController extends Controller
{
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function show($slug)
    {
        $page = $this->page->findBySlug($slug);

        return view('page::frontend.show', compact('page'));
    }

    // public function aboutUs()
    // {
    //     $first_section = (new PageResource($this->page->findById(setting('other','first_section'))))->jsonSerialize();
    //     $second_section = (new PageResource($this->page->findById(setting('other','second_section'))))->jsonSerialize();
    //     $third_section = (new PageResource($this->page->findById(setting('other','third_section'))))->jsonSerialize();

    //     return view('page::frontend.about-us', compact('first_section', 'second_section','third_section'));
    // }

    private function getBackGround($blade)
    {
        switch ($blade) {
            case 'charity' :
                return asset('frontend/images/add-charity.png');
            default:
                return null;
        }
    }
}
