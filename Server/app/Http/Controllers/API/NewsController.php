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
        $news = News::orderBy('id', 'DESC')->get();

        // Update image path for each item
        $news->map(function ($item) {
            $item->image = url('uploads/news/' . $item->image);
            return $item;
        });

        return response()->json($news);  // Return the data as JSON
    }

    public function details($slug)
    {
        $news = News::where('slug', $slug)->first();

        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }

        // Manually update the image URL
        $news->image = url('uploads/news/' . $news->image);

        return response()->json($news);
    }

}
