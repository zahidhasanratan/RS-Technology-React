<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\photo_gallery_table;
use App\PhotoGalleryTable;  // Updated model name
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        // Fetch all photos
        $photos = photo_gallery_table::orderBy('sl', 'ASC')->get();

        // Add full path to each image
        $photos->transform(function ($photo) {
            $photo->image = url('uploads/photo/' . $photo->image);
            return $photo;
        });

        return response()->json($photos);
    }
}
