<?php

namespace Modules\Service\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceApplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'desc'          => $this->desc,
            'service_id'    => $this->service->title,
            'file'          => $this->getFirstMediaUrl('file'),
            'created_at'    => date('d-m-Y', strtotime($this->created_at)),
        ];
    }
}
