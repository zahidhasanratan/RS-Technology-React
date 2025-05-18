<?php

namespace App\Http\Controllers\admin;

use App\photo_gallery_table;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $photo =   photo_gallery_table::all();
        return view('admin.photo.index',compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo.create');
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
            if (!file_exists('uploads/photo'))
            {
                mkdir('uploads/photo', 0777 , true);
            }
            $image->move('uploads/photo',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $photo = new photo_gallery_table();
        $photo->title = $request->title;
        $photo->designation = $request->designation;

        $photo->slug = $slug;
        $photo->image = $imagename;
        $photo->save();
        return redirect()->route('photo.index')->with('successMsg','PHoto Successfully Saved');

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
        $photo =   photo_gallery_table::find($id);
        return view('admin/photo/edit',compact('photo'));
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
        $photo= photo_gallery_table::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/photo'))
            {
                mkdir('uploads/photo', 0777 , true);
            }
            $image->move('uploads/photo',$imagename);
        }else {
            $imagename = $photo->image;
        }

        $photo->title = $request->title;
        $photo->designation = $request->designation;
        $photo->slug = $slug;
        $photo->image = $imagename;
        $photo->save();
        return redirect()->route('photo.index')->with('successMsg','Photo Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = photo_gallery_table::find($id);
        if (file_exists('uploads/photo/'.$photo->image))
        {
            unlink('uploads/photo/'.$photo->image);
        }
        $photo->delete();
        return redirect()->back()->with('successMsg','Photo Successfully Deleted');
    }
}
