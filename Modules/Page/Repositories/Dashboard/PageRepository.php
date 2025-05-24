<?php

namespace Modules\Page\Repositories\Dashboard;

use Modules\Core\Traits\RepositorySetterAndGetter;
use Modules\Page\Entities\Page;
use Hash;
use DB;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class PageRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(Page::class);
    }
}
