<?php

namespace App\Http\Controllers\admin;

use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team =   Team::where('Approved','!=',1)
            ->get();
        return view('admin.team.index',compact('team'));
    }
//
//    public function approve()
//    {
//        $team =   Team::all();
//        return view('admin.team.approve',compact('team'));
//    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team =   Team::all();
        return view('admin.team.approve',compact('team'));
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
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/team'))
            {
                mkdir('uploads/team', 0777 , true);
            }
            $image->move('uploads/team',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $team = new Team();
        $team->title = $request->title;
        $team->type = $request->type;
        $team->designation = $request->designation;
        $team->short = $request->short;
        $team->image = $imagename;
        $team->save();
        return redirect()->route('team.index')->with('successMsg','Member Successfully Saved');

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
        $team =   Team::find($id);
        return view('admin/team/edit',compact('team'));
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
            'Name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->Name);
        $team = Team::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/team'))
            {
                mkdir('uploads/team', 0777 , true);
            }
            $image->move('uploads/team',$imagename);
        }else {
            $imagename = $team->image;
        }

        $team->Name = $request->Name;
        $team->FatherMotherHusband = $request->FatherMotherHusband;
        $team->FatherMotherHusband = $request->FatherMotherHusband;
        $team->Age = $request->Age;

        $team->Occupation = $request->Occupation;
        $team->EducationQuali = $request->EducationQuali;
        $team->VillageHome = $request->VillageHome;
        $team->UnionMunicipality = $request->UnionMunicipality;
        $team->ThanaUpazila = $request->ThanaUpazila;

        $team->NID = $request->NID;
        $team->MobileNo = $request->MobileNo;
        $team->Email = $request->Email;
        $team->Approved = $request->Approved;
        $team->slug = $slug;

        $team->image = $imagename;
        $team->save();
        return redirect()->route('team.index')->with('successMsg','Member Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        if (file_exists('uploads/team/'.$team->image))
        {
            unlink('uploads/team/'.$team->image);
        }
        $team->delete();
        return redirect()->back()->with('successMsg','Member Successfully Deleted');
    }
}
