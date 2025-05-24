<?php

namespace Modules\Apps\Repositories\Dashboard;

use Modules\Apps\Entities\HomepageSection;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class HomepageSectionRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(HomepageSection::class);
        $this->statusAttribute=['status'];
        $this->model=new HomepageSection();
        $this->fileAttribute=['image'=>'image'];
    }
}
