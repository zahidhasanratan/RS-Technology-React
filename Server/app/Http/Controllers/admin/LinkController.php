<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link   =   Link::all();
        return view('admin.link.index',compact('link'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
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
            if (!file_exists('uploads/news'))
            {
                mkdir('uploads/news', 0777 , true);
            }
            $image->move('uploads/news',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
       
        $link = new Link();
        $link->title = $request->title;
       
        $link->url = $request->url;
        $link->slug = $slug;
        $link->image = $imagename;
        $link->save();
        return redirect()->route('link.index')->with('successMsg','Link Successfully Saved');
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
        $link =   Link::find($id);
        return view('admin/link/edit',compact('link'));
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
            'url' => 'required',

        ]);

        $slug = str_slug($request->title);
        $link = Link::find($id);
        $image = $request->file('image');

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/news'))
            {
                mkdir('uploads/news', 0777 , true);
            }
            $image->move('uploads/news',$imagename);
        }else {
            $imagename = $link->image;
        }
        $link->image = $imagename;
        $link->title = $request->title;
        $link->url = $request->url;
        $link->slug = $slug;
        $link->save();
        return redirect()->route('link.index')->with('successMsg','Link Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);

        $link->delete();
        return redirect()->back()->with('successMsg','Link Successfully Deleted');
    }
}
