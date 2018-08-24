<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class VisasResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'visa_no'      => $this->visa_no,
            'p1_app_type'        => $this->p1_app_type,
            'p1_fname'        => $this->p1_fname,
            //'status'        => ($this->isActive()) ? 'Active' : 'InActive',
            'created_at'    => $this->created_at->toDateString(),
        ];
    }
}
