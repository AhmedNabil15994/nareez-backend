<?php

namespace Modules\Course\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
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
        ];
    }
}
