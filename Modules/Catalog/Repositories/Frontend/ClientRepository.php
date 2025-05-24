<?php

namespace Modules\Catalog\Repositories\Frontend;

use Modules\Catalog\Entities\Client;

class ClientRepository
{
    public function __construct()
    {
        $this->model   = new Client();
    }

    public function getLimitedClients($order = 'id', $sort = 'desc')
    {
        $models = $this->model->active()->orderBy($order, $sort)->latest()->get();

        return $models;
    }
}
