<?php

namespace App\Http\Controllers\admin;

use App\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industry   =   Industry::all();
        return view('admin.industry.index',compact('industry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.industry.create');
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

        $industry = new Industry();
        $industry->title = $request->title;
        $industry->save();
        return redirect()->route('industry.index')->with('successMsg','Industry Successfully Saved');
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
        $industry =   Industry::find($id);
        return view('admin/industry/edit',compact('industry'));
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


        $industry = Industry::find($id);


        $industry->title = $request->title;

        $industry->save();
        return redirect()->route('industry.index')->with('successMsg','Industry Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industry = Industry::find($id);

        $industry->delete();
        return redirect()->back()->with('successMsg','Industry Successfully Deleted');
    }
}
