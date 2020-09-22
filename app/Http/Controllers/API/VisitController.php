<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Pet;
use App\Http\Resources\VisitResource;




class VisitController extends Controller
{
    
    public function index()
    {
        return VisitResource::collection(    
            Visit::all()
        );
    }

   
    public function store(Request $request)
    {
        // 'pet_id' => Pet::where('name',$request->pet_name)->pluck('id')->first(),

    }

   
    public function show($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
