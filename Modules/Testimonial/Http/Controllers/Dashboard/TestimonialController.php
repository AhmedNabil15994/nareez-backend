<?php

namespace Modules\Testimonial\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Traits\Dashboard\CrudDashboardController;
use Modules\Core\Traits\DataTable;
use Modules\Testimonial\Http\Requests\Dashboard\TestimonialRequest;
use Modules\Testimonial\Transformers\Dashboard\TestimonialResource;
use Modules\Testimonial\Repositories\Dashboard\TestimonialRepository as Testimonial;

class TestimonialController extends Controller
{
    use CrudDashboardController;
}
