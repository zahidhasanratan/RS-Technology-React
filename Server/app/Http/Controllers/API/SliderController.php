<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
//    public function index()
//    {
//
//        $slider = Slider::orderBy('id', 'DESC')->get();
//        return response()->json($slider);  // Return the data as JSON
//    }

    public function index()
    {
        // Fetch all sliders ordered by ID descending
        $sliders = Slider::orderBy('id', 'DESC')->get();

        // Update image path to full URL
        $sliders->transform(function ($slider) {
            $slider->image = url('uploads/slider/' . $slider->image);
            return $slider;
        });

        // Return as JSON
        return response()->json($sliders);
    }

}
