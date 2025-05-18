<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user =   User::all();

        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required',
        ]);



        $activity = new User();
        $activity->name = $request->name;
        $activity->email = $request->email;
        $activity->branch = $request->branch;
        $activity->password = Hash::make($request['password']);
        $activity->save();
        return redirect()->route('user.index')->with('successMsg','User Successfully Saved');

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
        $team =   User::find($id);
        return view('admin/user/edit',compact('team'));
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
            'name' => 'required',
        ]);


        $activity = User::find($id);
        $activity->name = $request->name;
        $activity->email = $request->email;
        $activity->branch = $request->branch;
        $activity->password = Hash::make($request['password']);
        $activity->save();
        return redirect()->route('user.index')->with('successMsg','User Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = User::find($id);
        $activity->delete();
        return redirect()->back()->with('successMsg','User Successfully Deleted');
    }
}
