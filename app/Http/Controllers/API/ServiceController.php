<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    public function index()
    {
        return ServiceResource::collection(    
            Service::all()
        );
    }

    public function show($service)
    {
        return new ServiceResource(
            Service::find($service)
        );
    }
}
