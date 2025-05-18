<?php

namespace App\Http\Controllers\admin;

use App\PreviousProgram;
use App\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class PreviousProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $previous =   PreviousProgram::all();
        return view('admin.previous.index',compact('previous'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.previous.create');
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
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/previous'))
            {
                mkdir('uploads/previous', 0777 , true);
            }
            $image->move('uploads/previous',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $previous = new PreviousProgram();
        $previous->title = $request->title;
        $previous->description = $request->description;
        $previous->duration = $request->duration;
        $previous->sub_title = $request->sub_title;
        $previous->short = $request->short;
        $previous->image = $imagename;
        $previous->save();

//        return redirect()->route('service.view',$request->sub_id)->with('successMsg','Committee Successfully Saved');

        return redirect()->back()->with('successMsg','Type Successfully Saved');

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
        $previous =   PreviousProgram::find($id);
        return view('admin/previous/edit',compact('previous'));
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
            'image' => 'mimes:jpeg,jpg,bmp,png,pdf',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $previous = PreviousProgram::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/previous'))
            {
                mkdir('uploads/previous', 0777 , true);
            }
            $image->move('uploads/previous',$imagename);
        }else {
            $imagename = $previous->image;
        }

        $previous->title = $request->title;
        $previous->short = $request->short;
        $previous->description = $request->description;
        $previous->duration = $request->duration;
//        $previous->sub_id = $request->sub_id;

        $previous->image = $imagename;
        $previous->save();

//        return redirect()->route('service.view',$request->sub_id)->with('successMsg','Committee Successfully Updated');

        return redirect()->back()->with('successMsg','Type Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $previous = PreviousProgram::find($id);
        if (file_exists('uploads/previous/'.$previous->image))
        {
            unlink('uploads/previous/'.$previous->image);
        }
        $previous->delete();
        return redirect()->back()->with('successMsg','Type Successfully Deleted');
    }
}
