<?php

namespace App\Http\Controllers\admin;

use App\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectorMyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sector   =   Sector::all();
        return view('admin.sector.index',compact('sector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sector.create');
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

        $sector = new Sector();
        $sector->title = $request->title;
        $sector->save();
        return redirect()->route('sector.index')->with('successMsg','Sector Successfully Saved');
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
        $sector =   Sector::find($id);
        return view('admin/sector/edit',compact('sector'));
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


        ]);


        $sector = Sector::find($id);


        $sector->title = $request->title;

        $sector->save();
        return redirect()->route('sector.index')->with('successMsg','Sector Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);

        $sector->delete();
        return redirect()->back()->with('successMsg','Sector Successfully Deleted');
    }
}
