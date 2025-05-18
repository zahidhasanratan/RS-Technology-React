<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\video;


class VideoController extends Controller
{
    public function index()
    {

        $video = video::orderBy('id', 'DESC')->get();
        return response()->json($video);  // Return the data as JSON
    }


}
