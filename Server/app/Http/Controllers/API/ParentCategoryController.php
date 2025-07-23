<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ParentCategory;
use App\Slider;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{


    public function index()
    {
        $sliders = ParentCategory::orderBy('id', 'DESC')->get();
        return response()->json($sliders);
    }
    public function show($id)
    {
        $category = ParentCategory::findOrFail($id);
        return response()->json($category);
    }
}
