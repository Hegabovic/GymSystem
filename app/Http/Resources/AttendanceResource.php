<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'session name' => $this->training_session->name,
            'Gym Name' => $this->gym->name,
            'atended at' => $this->created_at->format('H:m a'),
            'attended on' => $this->created_at->format('d-m-Y')
        ];
    }
}
