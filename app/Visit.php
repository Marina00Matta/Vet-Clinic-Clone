<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'user_id',
        'pet_id',
        'date',
        'time',
        'status',
    ];
    public function pet()
    {
        return $this->belongsTo('App\Pet');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
