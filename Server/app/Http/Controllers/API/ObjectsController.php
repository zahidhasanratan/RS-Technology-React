<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\News;
use App\Objects;
use App\Others;
use Illuminate\Http\Request;

class ObjectsController extends Controller
{
    public function object1()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();

        return response()->json($objects);  // Return the filtered data as JSON
    }

    public function object2()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return response()->json($objects);  // Return the filtered data as JSON
    }
    public function object3()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return response()->json($objects);  // Return the filtered data as JSON
    }
    public function objects5()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        return response()->json($objects);  // Return the filtered data as JSON
    }
    public function objects6()
    {
        // Fetch the object with id = 1, ordered by id in ascending order
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $objects->transform(function ($slider) {
            $slider->image = url('uploads/object/' . $slider->image);
            return $slider;
        });
        return response()->json($objects);
    }

    public function details($slug)
    {
        // Fetch the page based on the slug
        $page = Objects::where('slug', $slug)->first();

        // Check if the page exists
        if (!$page) {
            return response()->json(['message' => 'Page not found'], 404); // Return a 404 error if the page is not found
        }

        // Return the page data as JSON
        return response()->json($page); // Return the page data
    }

}
