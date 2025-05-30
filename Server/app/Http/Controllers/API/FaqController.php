<?php


namespace App\Http\Controllers\Api;


use App\Models\ClientsBenifitsModel;
use App\Models\FaqModel;
use App\Service;

class FaqController
{
    public function index()
    {
        $activities = FaqModel::orderBy('sl', 'asc')->get(); // Orders by 'sl' column in ascending order
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
        $clientBenifit = FaqModel::where('m_id', $service->id)
            ->orderBy('sl', 'asc')
            ->get();

        // Check if no technology records are found
        if ($clientBenifit->isEmpty()) {
            return response()->json(['message' => 'No related technologies found'], 404);
        }

        // Return the technology data as JSON
        return response()->json($clientBenifit, 200);
    }
}
