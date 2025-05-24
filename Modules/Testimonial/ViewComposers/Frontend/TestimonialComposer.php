<?php

namespace Modules\Testimonial\ViewComposers\Frontend;

use Modules\Testimonial\Repositories\Frontend\TestimonialRepository as Testimonial;
use Illuminate\View\View;
use Cache;

class TestimonialComposer
{
    public $testimonials = [];

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonials =  $testimonial->getRandom();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('testimonials', $this->testimonials);
    }
}
