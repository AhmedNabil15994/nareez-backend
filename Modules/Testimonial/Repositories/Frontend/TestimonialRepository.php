<?php

namespace Modules\Testimonial\Repositories\Frontend;

use Modules\Testimonial\Entities\Testimonial;
use DB;

class TestimonialRepository
{
    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial   = $testimonial;
    }

    public function getRandom($order = 'id', $sort = 'desc')
    {
        $testimonials = $this->testimonial->active()->inRandomOrder()->take(12)->get();

        return $testimonials;
    }

    public function findBySlug($slug)
    {
        return $this->testimonial->active()->whereTranslation('slug', $slug)->first();
    }
}
