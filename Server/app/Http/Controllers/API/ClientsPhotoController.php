<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientsPhoto;
use App\photo_gallery_table;
use App\PhotoGalleryTable;  // Updated model name
use Illuminate\Http\Request;

class ClientsPhotoController extends Controller
{
    public function index()
    {
        // Fetch all photos
        $photos = ClientsPhoto::orderBy('sl', 'ASC')->get();

        // Add full path to each image
        $photos->transform(function ($photo) {
            $photo->image = url('uploads/client/' . $photo->image);
            return $photo;
        });

        return response()->json($photos);
    }
}
