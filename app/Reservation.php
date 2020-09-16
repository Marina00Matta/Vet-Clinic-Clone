<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function boardings()
    {
        return $this->hasMany('App\Boarding');
    }

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pet()
    {
        return $this->belongsTo('App\Pet');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
