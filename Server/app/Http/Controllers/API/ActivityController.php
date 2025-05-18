<?php


namespace App\Http\Controllers\API;


use App\Activity;

class ActivityController
{
    public function index()
    {
        $activities = Activity::orderBy('sl', 'asc')->get();

        $activities->transform(function ($activity) {
            $activity->image = url('uploads/activity/' . $activity->image);
            return $activity;
        });

        return response()->json($activities);
    }

}
