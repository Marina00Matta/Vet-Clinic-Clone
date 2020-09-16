<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id'=> $this->user_id,
            'pet_id' => $this->pet_id,
            'date' => $this->date,
            'title' => $this->user ? $this->user->name : 'not exist',
            
            //'user_info' => new UserResource($this->user)
        ];
    }
}
