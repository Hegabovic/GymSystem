<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'session name'=>$this->training_session->name,
            'Gym Name'=>$this->gym->name,
            'atended at'=>$this->created_at->format('H:m a'),
            'attended on'=>$this->created_at->format('d-m-Y')
        ];
    }
}
