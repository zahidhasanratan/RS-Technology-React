<?php

namespace App\Http\Controllers\Api;


use App\Post;

class CareerController
{
    public function index()
    {
        $activities = Post::orderBy('sequence', 'asc')->get();
        return response()->json($activities);
    }

    public function details($slug)
    {
        // Fetch the page based on the slug
        $page = Post::where('slug', $slug)->first();

        // Check if the page exists
        if (!$page) {
            return response()->json(['message' => 'Post not found'], 404); // Return a 404 error if the page is not found
        }

        // Return the page data as JSON
        return response()->json($page);
    }

}
