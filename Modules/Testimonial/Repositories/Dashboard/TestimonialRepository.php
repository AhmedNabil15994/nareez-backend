<?php

namespace Modules\Testimonial\Repositories\Dashboard;

use Modules\Testimonial\Entities\Testimonial;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class TestimonialRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(Testimonial::class);

        $this->fileAttribute=['image'=>'image'];
    }
}
