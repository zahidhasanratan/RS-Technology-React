<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use App\Models\SubCategory;
use App\Slider;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $sliders = Item::orderBy('id', 'DESC')->get();
        $sliders->transform(function ($slider) {
            $slider->image = url('uploads/item/' . $slider->image);
            return $slider;
        });
        return response()->json($sliders);
    }
    public function show($slug)
    {
        $categories = Item::where('slug', $slug)->get();

        $categories->transform(function ($category) {
            $category->image = url('uploads/item/' . $category->image);
            return $category;
        });

        return response()->json($categories);
    }
}
