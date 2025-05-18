<?php

namespace App\Http\Controllers\admin;

use App\MedicalFeature;
use App\Menu;
use App\Others;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicalFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalfeature =   MedicalFeature::all();
        return view('admin.medicalfeature.index',compact('medicalfeature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicalfeature.create');
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
            if (!file_exists('uploads/medicalfeature'))
            {
                mkdir('uploads/medicalfeature', 0777 , true);
            }
            $image->move('uploads/medicalfeature',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $medicalfeature = new MedicalFeature();
        $medicalfeature->title = $request->title;

        $medicalfeature->slug = $slug;
        $medicalfeature->short = $request->short;
        $medicalfeature->description = $request->description;
        $medicalfeature->image = $imagename;
        $medicalfeature->save();
        return redirect()->route('medicalfeature.index')->with('successMsg','Medical Feature Successfully Saved');

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
        $medicalfeature =   MedicalFeature::find($id);
        return view('admin/medicalfeature/edit',compact('medicalfeature'));
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
        $medicalfeature = MedicalFeature::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/medicalfeature'))
            {
                mkdir('uploads/medicalfeature', 0777 , true);
            }
            $image->move('uploads/medicalfeature',$imagename);
        }else {
            $imagename = $medicalfeature->image;
        }

        $medicalfeature->title = $request->title;
        $medicalfeature->slug = $slug;
        $medicalfeature->short = $request->short;
        $medicalfeature->description = $request->description;
        $medicalfeature->image = $imagename;
        $medicalfeature->save();
        return redirect()->route('medicalfeature.index')->with('successMsg','Medical Feature Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalfeature = MedicalFeature::find($id);
        if (file_exists('uploads/medicalfeature/'.$medicalfeature->image))
        {
            unlink('uploads/medicalfeature/'.$medicalfeature->image);
        }
        $medicalfeature->delete();
        return redirect()->back()->with('successMsg','Medical Feature Successfully Deleted');
    }
    public function details($slug){
        $medicalfeature = MedicalFeature::where('slug',$slug)->first();

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
        return view('frontend/medical.details',compact('contact2','headoffice','medicalfeature','main','contact1','footer'));
    }
}
