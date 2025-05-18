<?php

namespace App\Http\Controllers\admin;

use App\video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video =   video::all();
        return view('admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/video'))
            {
                mkdir('uploads/video', 0777 , true);
            }
            $image->move('uploads/video',$imagename);
        }else {
            $imagename = 'dafault.png';
        }


        $video = new video();
        $video->title = $request->title;
        $video->short = $request->description;
        $video->image = $imagename;

        $video->save();
        return redirect()->route('video.index')->with('successMsg','Video Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video =   video::find($id);
        return view('admin/video/edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $video = video::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/video'))
            {
                mkdir('uploads/video', 0777 , true);
            }
            $image->move('uploads/video',$imagename);
        }else {
            $imagename = $video->image;
        }


        $video->title = $request->title;
        $video->short = $request->description;
        $video->image = $imagename;
        $video->save();
        return redirect()->route('video.index')->with('successMsg','Video Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = video::find($id);
        if (file_exists('uploads/video/'.$video->image))
        {
            unlink('uploads/video/'.$video->image);
        }
        $video->delete();
        return redirect()->back()->with('successMsg','Video Successfully Deleted');
    }
}
