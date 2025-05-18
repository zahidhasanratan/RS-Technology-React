<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        $videos = Category::orderBy('id', 'DESC')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'image' => $item->image ? asset('uploads/category/' . $item->image) : null,
                'images2' => $item->images2
                    ? array_map(function ($img) {
                        return asset('images/' . $img);
                    }, explode(',', $item->images2))
                    : [],
                'description' => $item->description,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        return response()->json($videos);
    }
    public function details($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->image = $category->image ? asset('uploads/category/' . $category->image) : null;

        // Convert images2 from CSV to array of full URLs
        $category->images2 = $category->images2
            ? array_map(function ($img) {
                return asset('images/' . $img);
            }, explode(',', $category->images2))
            : [];

        return response()->json($category);
    }


}
