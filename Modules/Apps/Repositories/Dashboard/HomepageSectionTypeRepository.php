<?php

namespace Modules\Apps\Repositories\Dashboard;

use Modules\Apps\Entities\HomepageSectionType;
use Modules\Core\Repositories\Dashboard\CrudRepository;
use Modules\Core\Traits\Dashboard\CrudDashboardController;

class HomepageSectionTypeRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(HomepageSectionType::class);
        $this->statusAttribute=['status'];

        $this->fileAttribute=['image'=>'image'];
    }
}
