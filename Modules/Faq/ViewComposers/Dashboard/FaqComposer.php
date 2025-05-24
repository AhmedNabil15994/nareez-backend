<?php

namespace Modules\Faq\ViewComposers\Dashboard;

use Modules\Faq\Repositories\Dashboard\FaqRepository as Faq;
use Illuminate\View\View;
use Cache;

class FaqComposer
{
    public $faqs = [];

    public function __construct(Faq $faq)
    {
        $this->faqs =  $faq->getAllActive('id', 'asc');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('faqs', $this->faqs);
    }
}
