<?php

namespace Modules\Apps\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class HomepageSectionResource extends JsonResource
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
                    'id' => $this->id,
                    'title' => $this->title,
                    'image' => asset($this->image),
                    'created_at' => date('d-m-Y', strtotime($this->created_at)),
        ];
    }
}
