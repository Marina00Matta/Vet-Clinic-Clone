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
        $visit  = new Visit();
        $visit->user_id = $request->user_id;
        $visit->pet_id = $request->pet_id;
        $visit->date = $request->date;
        $visit->time = $request->time;
        $visit->status = 'pending';
        $visit.save();
        return response()->json(['status' => 'success' ]); 

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
