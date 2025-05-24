<?php

namespace Modules\Faq\Repositories\Dashboard;

use Modules\Faq\Entities\Faq;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class FaqRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(Faq::class);
    }
}
