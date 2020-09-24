<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    
    public function toArray($request)
    {
        {
            return [

            'id' => $this->id,   
            'day' =>$this->day,
            'date' => $this->date,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            
            ];
        }  
    }
}
