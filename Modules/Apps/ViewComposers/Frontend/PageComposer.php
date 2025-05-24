<?php

namespace Modules\Apps\ViewComposers\Frontend;

use Modules\Page\Repositories\Frontend\PageRepository as Page;
use Illuminate\View\View;
use Modules\Page\Transformers\Frontend\PageResource;

class PageComposer
{
    public $pages = [];

    public function __construct(Page $page)
    {
        $this->pages =  $page;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $about_us_page = $this->pages->findById(setting('other', 'about_us'));
        $privacy_policy = $this->pages->findById(setting('other', 'terms'));
        $about_us_page = $about_us_page ? (new PageResource($about_us_page))->jsonSerialize() : null;
        $privacy_policy = $privacy_policy ? (new PageResource($privacy_policy))->jsonSerialize() : null;
        $view->with(compact('about_us_page', 'privacy_policy'));
    }
}
