<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Appointment;
use App\Http\Resources\AppointmentResource;

class AppointmentController extends Controller
{
    
    public function index()
    {
        return AppointmentResource::collection(    
            Appointment::all()
        );
    }

    
    public function store(Request $request)
    {
        $app = new Appointment([

        'id' => $$request->get('id'),   
        'day' =>$$request->get('day'),
        'date' => $$request->get('date'),
        'start_time'=>$$request->get('start_time'),
        'end_time'=>$$request->get('end_time'),            
                ]);
                $app->save();
                return response()->json(['status' => 'success' ]); 
    }


    public function show($id)
    {
        return new AppointmentResource(
            Appointment::find($id)
        );
    }

    
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
