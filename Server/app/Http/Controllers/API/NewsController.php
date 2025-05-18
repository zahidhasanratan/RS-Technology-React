<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\News;
use App\Slider;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Example of fetching the latest 3 services for the slider
        $news = News::orderBy('id', 'DESC')->get();
        return response()->json($news);  // Return the data as JSON
    }
    public function details($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        return response()->json($news); // Return the news data as JSON
    }
}
