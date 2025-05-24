<?php

namespace Modules\User\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
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
            'id'          => $this->id,
            'first_side'  => optional($this->firstSide)->name?optional($this->firstSide)->name:'from dashboard',
            'second_side' => $this->secondSide->name,
            'created_at'  => date('d-m-Y', strtotime($this->created_at)),
        ];
    }
}
