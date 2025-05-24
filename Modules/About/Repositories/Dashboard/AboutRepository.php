<?php

namespace Modules\About\Repositories\Dashboard;

use Modules\About\Entities\About;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class AboutRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(About::class);
        $this->statusAttribute=['status'];
        $this->fileAttribute=['image'=>'image'];
    }
}
