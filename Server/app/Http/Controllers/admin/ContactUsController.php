<?php

namespace App\Http\Controllers\admin;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus = ContactUs::all();
        return view('admin.contactus.index',compact('contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contactus.create');
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



        $contactus = new ContactUs();
        $contactus->title = $request->title;
        $contactus->address = $request->address;
        $contactus->phone = $request->phone;
        $contactus->save();
        return redirect()->route('contactus.index')->with('successMsg','Contact Us Successfully Saved');

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
        $contactus =   ContactUs::find($id);
        return view('admin/contactus/edit',compact('contactus'));
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

        $contactus = ContactUs::find($id);


        $contactus->title = $request->title;


        $contactus->address = $request->address;
        $contactus->phone = $request->phone;
        $contactus->save();
        return redirect()->route('contactus.index')->with('successMsg','Contact Us Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactus = ContactUs::find($id);

            $contactus->delete();
        return redirect()->back()->with('successMsg','Contact Us Successfully Deleted');
    }
}
