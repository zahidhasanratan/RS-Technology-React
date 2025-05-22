<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sl', 'asc')->get();
        $services->transform(function ($services) {
            $services->image = url('uploads/service/' . $services->image);
            return $services;
        });
        return response()->json($services);
    }
    public function details($slug)
    {
        $service = Service::where('slug', $slug)->first();

        // Check if service exists before trying to transform it
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        // Modify the image path
        $service->image = url('uploads/service/' . $service->image);

        // Return the service data as JSON
        return response()->json($service);
    }

}
