<?php

namespace Modules\Service\ViewComposers\Frontend;

use Modules\Service\Repositories\Frontend\ServiceRepository as Service;
use Illuminate\View\View;
use Cache;

class ServiceComposer
{
    public $services = [];

    public function __construct(Service $category)
    {
        $this->last2Services  =  $category->getLimit('id', 'DESC');
        $this->first2Services =  $category->getLimit('id', 'ASC');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('first2Services', $this->first2Services);
        $view->with('last2Services', $this->last2Services);
    }
}
