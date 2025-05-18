<?php


namespace App\Http\Controllers\API;


use App\Models\Technology;
use App\Service;

class TechnologyController
{
    public function index()
    {
        $activities = Technology::orderBy('sl', 'asc')->get(); // Orders by 'sl' column in ascending order
        return response()->json($activities);
    }

    public function details($slug)
    {
        // Retrieve the service by slug
        $service = Service::where('slug', $slug)->first();

        // Check if the service exists
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        // Retrieve the associated technology records
        $technology = Technology::where('m_id', $service->id)
            ->orderBy('sl', 'asc')
            ->get();

        // Check if no technology records are found
        if ($technology->isEmpty()) {
            return response()->json(['message' => 'No related technologies found'], 404);
        }

        // Return the technology data as JSON
        return response()->json($technology, 200);
    }


//    public function details($slug)
//    {
//        $id = Service::where('slug', $slug)->first()->id;
//        $technology = Technology::where('m_id', $id)->orderBy('sl', 'asc')->get();
//
//        if (!$technology) {
//            return response()->json(['message' => 'Service not found'], 404);
//        }
//
//        return response()->json($technology); // Return the news data as JSON
//    }
}
