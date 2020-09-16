<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    public function boarding()
    {
        return $this->hasOne('App\Boarding');
    }
}
