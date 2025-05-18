<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\photo_gallery_table;
use App\PhotoGalleryTable;  // Updated model name
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        // Example of fetching all photos, you can paginate if needed
        $photos = photo_gallery_table::orderBy('id', 'DESC')->get();
        return response()->json($photos);  // Return the data as JSON
    }
}
