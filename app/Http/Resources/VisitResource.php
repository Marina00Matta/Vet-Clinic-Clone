<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        {
            return [
                'id' => $this->id,
                'user_id'=> $this->user_id,
                'pet_id' => $this->pet_id,
                'date' => $this->date,
                'time'=>$this->time,
                'status'=>$this->status,
                // 'created_at'=>$this->created_at,
                // 'updated_at'=>$this->updated_at
            ];
        }
    }
}
