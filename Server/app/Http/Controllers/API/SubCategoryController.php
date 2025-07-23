<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sliders = SubCategory::orderBy('id', 'DESC')->get();
        $sliders->transform(function ($slider) {
            $slider->image = url('uploads/scategory/' . $slider->image);
            return $slider;
        });

        return response()->json($sliders);
    }

    public function show($id)
    {
        $categories = SubCategory::where('parent_category_id', $id)->get();

        $categories->transform(function ($category) {
            $category->image = url('uploads/scategory/' . $category->image);
            return $category;
        });

        return response()->json($categories);
    }
}
