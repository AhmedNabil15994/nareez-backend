<?php

namespace Modules\Testimonial\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Testimonial\Repositories\Frontend\TestimonialRepository as Testimonial;

class TestimonialController extends Controller
{
    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial    = $testimonial;
    }

    public function index()
    {
        $testimonials = $this->testimonial->getAllActive();

        return view('testimonial::frontend.index', compact('testimonials'));
    }

    public function show($slug)
    {
        $testimonial = $this->testimonial->findBySlug($slug);

        if (!$testimonial) {
            abort(404);
        }

        return view('testimonial::frontend.show', compact('testimonial'));
    }
}
