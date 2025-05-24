<?php

namespace Modules\About\Repositories\Dashboard;

use Modules\About\Entities\AboutType;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class AboutTypeRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(AboutType::class);
        $this->statusAttribute=['status'];
        $this->fileAttribute=['image'=>'image'];
    }
}
