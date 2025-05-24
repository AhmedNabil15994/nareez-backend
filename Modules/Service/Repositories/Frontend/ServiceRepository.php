<?php

namespace Modules\Service\Repositories\Frontend;

use Modules\Service\Entities\Service;
use DB;

class ServiceRepository
{
    public function __construct(Service $service)
    {
        $this->service   = $service;
    }

    public function getLimit($order = 'id', $sort = 'desc')
    {
        $services = $this->service->active()->orderBy($order, $sort)->paginate(2);

        return $services;
    }
    public function getAllActive($order = 'id', $sort = 'desc')
    {
        $services = $this->service->active()->orderBy($order, $sort)->get();

        return $services;
    }
}
