<?php

namespace App\Http\Controllers\admin;

use App\MecroFinance;
use App\Menu;
use App\Others;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MicroFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalfeature =   MecroFinance::all();
        return view('admin.microfinancefeature.index',compact('medicalfeature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.microfinancefeature.create');
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
            if (!file_exists('uploads/microfinancefeature'))
            {
                mkdir('uploads/microfinancefeature', 0777 , true);
            }
            $image->move('uploads/microfinancefeature',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $medicalfeature = new MecroFinance();
        $medicalfeature->title = $request->title;

        $medicalfeature->slug = $slug;
        $medicalfeature->short = $request->short;
        $medicalfeature->description = $request->description;
        $medicalfeature->save();
        return redirect()->route('microfinancefeature.index')->with('successMsg','Micro Finance Feature Successfully Saved');

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
        $medicalfeature =   MecroFinance::find($id);
        return view('admin/microfinancefeature/edit',compact('medicalfeature'));
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
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $medicalfeature = MecroFinance::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/microfinancefeature'))
            {
                mkdir('uploads/microfinancefeature', 0777 , true);
            }
            $image->move('uploads/microfinancefeature',$imagename);
        }else {
            $imagename = $medicalfeature->image;
        }

        $medicalfeature->title = $request->title;
        $medicalfeature->slug = $slug;
        $medicalfeature->short = $request->short;
        $medicalfeature->image = $imagename;
        $medicalfeature->description = $request->description;
        $medicalfeature->save();
        return redirect()->route('microfinancefeature.index')->with('successMsg','Micro Finance Feature Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalfeature = MecroFinance::find($id);
        if (file_exists('uploads/microfinancefeature/'.$medicalfeature->image))
        {
            unlink('uploads/microfinancefeature/'.$medicalfeature->image);
        }
        $medicalfeature->delete();
        return redirect()->back()->with('successMsg','Micro Finance Successfully Deleted');
    }
    public function details($slug){
        $medicalfeature = MecroFinance::where('slug',$slug)->first();

        $main   =   Menu::orderBy('id','DESC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        return view('frontend/micro.details',compact('contact2','headoffice','medicalfeature','main','contact1','footer'));
    }
}
