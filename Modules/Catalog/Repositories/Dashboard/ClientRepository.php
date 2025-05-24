<?php

namespace Modules\Catalog\Repositories\Dashboard;

use Modules\Catalog\Entities\Client;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class ClientRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(new Client());
        $this->fileAttribute = ['image' => 'image'];
    }
}
