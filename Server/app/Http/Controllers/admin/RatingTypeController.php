<?php

namespace App\Http\Controllers\admin;

use App\Ratingtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $ratingtype   =   Ratingtype::all();
        return view('admin.ratingtype.index',compact('ratingtype'));
    }
    public function create()
    {
        return view('admin.ratingtype.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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

        $ratingtype = new Ratingtype();
        $ratingtype->title = $request->title;
        $ratingtype->save();
        return redirect()->route('ratingtype.index')->with('successMsg','Rating Type Successfully Saved');
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
        $ratingtype =   Ratingtype::find($id);
        return view('admin/ratingtype/edit',compact('ratingtype'));
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


        $ratingtype = Ratingtype::find($id);


        $ratingtype->title = $request->title;

        $ratingtype->save();
        return redirect()->route('ratingtype.index')->with('successMsg','Rating Type Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ratingtype = Ratingtype::find($id);

        $ratingtype->delete();
        return redirect()->back()->with('successMsg','Rating Type Successfully Deleted');
    }
}
