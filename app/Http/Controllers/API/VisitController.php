<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Pet;
use App\User;
use App\Http\Resources\VisitResource;
use App\Http\Requests\visits\VisitRequest;
use App\Http\Requests\visits\UpdateVisitRequest;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;




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
        if ($visit) {
            $user = User::find ($visit->user_id);
            $user_mail = new NewMail($user);
            $admin = User::find(1);
            $admin_mail = new NewMail($admin);
            
            // Mail::to($user->email)->send($user_mail);
            // Mail::to($admin->email)->send($admin_mail);
        }
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
