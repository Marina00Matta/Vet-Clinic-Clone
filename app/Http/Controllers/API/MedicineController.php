<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Medicine;
use App\Http\Resources\MedicineResource;

class MedicineController extends Controller
{
    
    public function index()
    {
        return MedicineResource::collection(    
            Medicine::all()
        );
    }

    
    public function store(Request $request)
    {
        

        $medicine = new Medicine([
            'name' => $request->get('name'),
            
        ]);
        $medicine->save();
        return response()->json(['status' => 'success' ]); 
    }

    
    // public function show($id)
    // {
        
    // }

    
    // public function update(Request $request, $id)
    // {
        

    //     $medicine = Medicine::find($id);
    //     $medicine->name =  $request->get('name');

    //     $medicine->save();

    //     return response()->json(['status' => 'success, Medicine Updated!!' ]); 

    // }

    
    // public function destroy($id)
    // {
    //     $medicine = Medicine::find($id);
    //     $medicine->delete();
    // }
}
