<?php

namespace Modules\Page\ViewComposers\Frontend;

use Modules\Page\Repositories\Frontend\PageRepository as Page;
use Illuminate\View\View;
use Cache;

class PageComposer
{
    public $data;


    public function __construct(Page $page)
    {
        $this->data['aboutUs'] = $page->getAboutUsPage();
        $this->data['terms'] = $page->getTermsPage();
        $this->data['privacyPage'] = $page->getPrivacyPage();
        $this->data['faqs'] = $page->getFaqsPage();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with($this->data);
    }
}
