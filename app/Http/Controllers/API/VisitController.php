<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Pet;
use App\Http\Resources\VisitResource;
use App\Http\Requests\visits\VisitRequest;
use App\Http\Requests\visits\UpdateVisitRequest;




class VisitController extends Controller
{
    
    public function index()
    {
        return VisitResource::collection(    
            Visit::all()
        );
    }

   
    public function store(VisitRequest $request)
    {
        $visit  = new Visit();
        $visit->user_id = $request->user_id;
        $visit->pet_id = $request->pet_id;
        $visit->date = $request->date;
        $visit->time = $request->time;
        $visit->status = $request->status;
        $visit->save();
        return response()->json(['status' => 'success' ]); 

    }

   
    public function show($id)
    {
        //
    }

   
    public function update(VisitRequest $request)
    {
        $visit = Visit::find($request->visit);
        $visit->user_id = $request->user_id;
        $visit->pet_id = $request->pet_id;
        $visit->status = $request->status;
        $visit->save();
    }
    public function updateStatus(UpdateVisitRequest $request)
    {
        $visit = Visit::find($request->visit);
        $visit->status = $request->status;
        $visit->save();
    }

    
    public function destroy($id)
    {
        //
    }
}
