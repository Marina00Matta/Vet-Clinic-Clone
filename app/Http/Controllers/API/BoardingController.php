<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Boarding;
use App\Pet;
use App\Http\Requests\BoardingRequest;


class BoardingController extends Controller
{
    public function add(BoardingRequest $request)
    {    
        // dd(request());
        $boarding = Boarding::create([
            'pet_id' => Pet::where('name',$request->pet_name)->pluck('id')->first(),
            'reservation_id' => $request->reservation_id,
            'cage_id' => $request->cage_id,
            'end_date' => $request->end_date
        ]);

        return response()->json([
            'success'=>true, 
            'message'=>'boarding made',
            'boarding'=>$boarding
        ]);
    }
}