<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
