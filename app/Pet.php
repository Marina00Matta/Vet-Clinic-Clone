<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'breed',
        'color',
        'age',
        'gender',
        'species',
        'weight',
        'neutered',
        'previous_problems',
        'drug_allergies',
        'current_diet',
        'current_medication'
    ];

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

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
}
