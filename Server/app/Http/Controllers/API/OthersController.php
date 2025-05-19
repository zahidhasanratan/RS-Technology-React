<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\News;
use App\Objects;
use App\Others;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function others2()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return response()->json($objects);  // Return the filtered data as JSON
    }

    public function others6()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();

        return response()->json($objects);  // Return the filtered data as JSON
    }
    public function others7()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();

        return response()->json($objects);  // Return the filtered data as JSON
    }

    public function details($slug)
    {
        // Fetch the page based on the slug
        $page = Others::where('slug', $slug)->first();

        // Check if the page exists
        if (!$page) {
            return response()->json(['message' => 'Page not found'], 404); // Return a 404 error if the page is not found
        }

        // Return the page data as JSON
        return response()->json($page); // Return the page data
    }

}
