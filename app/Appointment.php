<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'day',
        'date',
        'start_time',
        'end_time',
    ];
}
