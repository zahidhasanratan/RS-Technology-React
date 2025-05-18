<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUser extends Controller
{
    public function index()
    {
        $adminuser =   Admin::all()->where('active', NULL);

        return view('admin.adminuser.index',compact('adminuser'));
    }

    public function edit($id)
    {
        $adminuser =   Admin::find($id);
        return view('admin/adminuser/edit',compact('adminuser'));
    }
    public function edituser($id)
    {
        $adminuser =   Admin::find($id);
        return view('admin/adminuser/deactive',compact('adminuser'));
    }


    public function destroy($id)
    {
        $adminuser = Admin::find($id);

        $adminuser->delete();
        return redirect()->back()->with('successMsg','User Successfully Deleted');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'active' => 'required',

        ]);

        $adminuser = Admin::find($id);


        $adminuser->active = $request->active;
        $adminuser->save();
        return redirect()->route('adminuser.approve')->with('successMsg','Member Successfully Approved');
    }

    public function updatedeactive(Request $request, $id)
    {

        $this->validate($request,[


        ]);
        $adminuser = Admin::find($id);


        $adminuser->active = $request->active;
        $adminuser->save();
        return redirect()->route('adminuser.index')->with('successMsg','Member  Deactivated');
    }

    public function pending()
    {
        $adminuser =   Admin::all()->where('active', 1);

        return view('admin.adminuser.approve',compact('adminuser'));
    }
}
