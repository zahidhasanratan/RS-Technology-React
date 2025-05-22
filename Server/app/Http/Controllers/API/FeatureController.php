<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FeaturedModel;
use App\Service;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $services = FeaturedModel::orderBy('sl', 'asc')->get(); // Orders by 'sl' column in ascending order
        return response()->json($services);
    }
    public function details($slug)
    {
        $news = FeaturedModel::where('slug', $slug)->first();

        if (!$news) {
            return response()->json(['message' => 'Featured Details not found'], 404);
        }

        return response()->json($news); // Return the news data as JSON
    }

    public function detailsSlug($slug)
    {
        // Retrieve the service by slug
        $service = Service::where('slug', $slug)->first();

        // Check if the service exists
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        // Retrieve the associated technology records
        $featuredSlug = FeaturedModel::where('m_id', $service->id)
            ->orderBy('sl', 'asc')
            ->get();

        // Check if no technology records are found
        if ($featuredSlug->isEmpty()) {
            return response()->json(['message' => 'No related technologies found'], 404);
        }

        // Return the technology data as JSON
        return response()->json($featuredSlug, 200);
    }
}
