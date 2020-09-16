<?php

namespace App\Http\Controllers\API;

use App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PetResource;
use Illuminate\Support\Facades\Auth;

class PetsController extends Controller
{
    //
    public function add(Request $request)
    {    
        $pet = Pet::create([
            'name' => request()->name,
            'user_id' => request()->user_id,
            'species' => request()->species,
            'breed' => request()->breed,
            'color' => request()->color,
            'age' => request()->age,
            'weight' => request()->weight,
            'neutered'=> request()->neutered ? "yes":"no",
            'previous_problems' => request()->previous_problems,
            'drug_allergies' => request()->drug_allergies,
            'current_diet' => request()->current_diet,
            'current_medication'=> request()->current_medication,
            'weight'=>request()->weight,
            'gender'=> request()->gender,
      
           
        ]);

        return response()->json([
            'success'=>true, 
            'message'=>'pet added.', 
            'pet'=>$pet
        ]);
    }

    public function index()
    {
        return PetResource::collection(    
            Pet::where('user_id', auth()->user()->id)->get()
        );
    }
}
