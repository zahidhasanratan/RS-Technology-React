<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Page; // Ensure you have the correct Page model
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function details($slug)
    {
        // Fetch the page based on the slug
        $page = Page::where('title_uri', $slug)->first();

        // Check if the page exists
        if (!$page) {
            return response()->json(['message' => 'Page not found'], 404); // Return a 404 error if the page is not found
        }

        // Return the page data as JSON
        return response()->json($page); // Return the page data
    }
}
