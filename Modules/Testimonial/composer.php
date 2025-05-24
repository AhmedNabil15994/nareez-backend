<?php

view()->composer([
    'apps::frontend.sections.testimonials',
    'about::frontend.sections.testimonials'
], \Modules\Testimonial\ViewComposers\Frontend\TestimonialComposer::class);
