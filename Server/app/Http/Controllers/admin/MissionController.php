<?php

namespace App\Http\Controllers\admin;

use App\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class MissionController extends Controller
{
    public function index()
    {
        $mission   =   Mission::all();
        return view('admin.mission.index',compact('mission'));
        //
    }
    public function edit($id)
    {
        $mission =   Mission::find($id);
        return view('admin/mission/edit',compact('mission'));
    }
    public function show()
    {
        $mission   =   Mission::all();
        return view('admin.mission.index',compact('mission'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',

        ]);


        $mission = Mission::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $mission->title = $request->title;
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/mission'))
            {
                mkdir('uploads/mission', 0777 , true);
            }
            $image->move('uploads/mission',$imagename);
        }else {
            $imagename = $mission->image;
        }
        $mission->description = $request->description;
        $mission->image = $imagename;

        $mission->save();
        return redirect()->route('mission.index')->with('successMsg','Successfully Updated');
    }
}
