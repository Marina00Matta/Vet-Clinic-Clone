<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
    ];


    public function consultation()
    {
        return $this->belongsTo('App\Consultatin');
    }
}
