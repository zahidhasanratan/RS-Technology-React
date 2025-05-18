<?php

namespace App\Http\Controllers\admin;

use App\CompanyManagement;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class CompanyManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company =   CompanyManagement::all();
        return view('admin.company.index',compact('company'));
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
            'designation' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/company'))
            {
                mkdir('uploads/company', 0777 , true);
            }
            $image->move('uploads/company',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $company = new CompanyManagement();
        $company->title = $request->title;
        $company->designation = $request->designation;
        $company->type = $request->type;
        $company->slug = $slug;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('company.index')->with('successMsg','Company Successfully Saved');

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
        $company =   CompanyManagement::find($id);
        return view('admin/company/edit',compact('company'));
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
            'designation' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $company = CompanyManagement::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/company'))
            {
                mkdir('uploads/company', 0777 , true);
            }
            $image->move('uploads/company',$imagename);
        }else {
            $imagename = $company->image;
        }

        $company->title = $request->title;
        $company->designation = $request->designation;
        $company->type = $request->type;
        $company->slug = $slug;
        $company->image = $imagename;
        $company->save();
        return redirect()->route('company.index')->with('successMsg','Company Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = CompanyManagement::find($id);
        if (file_exists('uploads/company/'.$company->image))
        {
            unlink('uploads/company/'.$company->image);
        }
        $company->delete();
        return redirect()->back()->with('successMsg','Company Management Successfully Deleted');
    }
}
