<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boarding extends Model
{
    protected $guarded = [];

    public function pet()
    {
        return $this->belongsTo('App\Pet');
    }

    public function cage()
    {
        return $this->belongsTo('App\Cage');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
}
