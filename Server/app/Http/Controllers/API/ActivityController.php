<?php


namespace App\Http\Controllers\API;


use App\Activity;

class ActivityController
{
    public function index()
    {
        $activities = Activity::orderBy('sl', 'asc')->get(); // Orders by 'sl' column in ascending order
        return response()->json($activities);
    }
}
