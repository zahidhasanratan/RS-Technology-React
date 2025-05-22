<?php


namespace App\Http\Controllers\Api;

use App\Models\Technology;
use App\Models\WebProcessModel;
use App\Service;

class WebProcessController
{
    public function index()
    {
        $activities = WebProcessModel::orderBy('sl', 'asc')->get(); // Orders by 'sl' column in ascending order
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
        $webprocess = WebProcessModel::where('m_id', $service->id)
            ->orderBy('sl', 'asc')
            ->get();

        // Check if no technology records are found
        if ($webprocess->isEmpty()) {
            return response()->json(['message' => 'No related technologies found'], 404);
        }

        // Return the technology data as JSON
        return response()->json($webprocess, 200);
    }
}
