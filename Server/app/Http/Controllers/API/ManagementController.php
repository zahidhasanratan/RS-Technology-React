<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LifeMember;
use App\Slider;
use Illuminate\Http\Request;

class ManagementController extends Controller
{


    public function index()
    {
        // Fetch all sliders ordered by ID descending
        $sliders = LifeMember::orderBy('id', 'DESC')->get();

        // Update image path to full URL
        $sliders->transform(function ($slider) {
            $slider->image = url('uploads/life/' . $slider->image);
            return $slider;
        });

        // Return as JSON
        return response()->json($sliders);
    }

}
