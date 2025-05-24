<?php

namespace App\Http\Controllers\Api;


use App\Post;

class CareerController
{
    public function index()
    {
        $activities = Post::orderBy('sequence', 'asc')->get();
        return response()->json($activities);
    }

}
