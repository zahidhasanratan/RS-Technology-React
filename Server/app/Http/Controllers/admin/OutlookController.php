<?php

namespace App\Http\Controllers\admin;

use App\Outlook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutlookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlook   =   Outlook::all();
        return view('admin.outlook.index',compact('outlook'));
    }

    public function create()
    {
        return view('admin.outlook.create');
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

        $outlook = new Outlook();
        $outlook->title = $request->title;
        $outlook->save();
        return redirect()->route('outlook.index')->with('successMsg','Outlook Successfully Saved');
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
        $outlook =   Outlook::find($id);
        return view('admin/outlook/edit',compact('outlook'));
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


        $outlook = Outlook::find($id);


        $outlook->title = $request->title;

        $outlook->save();
        return redirect()->route('outlook.index')->with('successMsg','Outlook Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlook = Outlook::find($id);

        $outlook->delete();
        return redirect()->back()->with('successMsg','Outlook Successfully Deleted');
    }
}
