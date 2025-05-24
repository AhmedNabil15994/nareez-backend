<?php

namespace Modules\Apps\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class HomepageSectionTypeResource extends JsonResource
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
            'key' => $this->key,
            'title' => $this->title,
            'order' => $this->order,
        ];
    }
}
