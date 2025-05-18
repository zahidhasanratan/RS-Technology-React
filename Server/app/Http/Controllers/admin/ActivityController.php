<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Others;
use Carbon\Carbon;
use App\menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity =   Activity::all();
        return view('admin.activity.index',compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity.create');
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
        $slug = Str::slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/activity'))
            {
                mkdir('uploads/activity', 0777 , true);
            }
            $image->move('uploads/activity',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $activity = new Activity();
        $activity->title = $request->title;
        $activity->slug = $slug;
        $activity->short = $request->short;
        $activity->sub_title = $request->sub_title;
        $activity->description = $request->description;
        $activity->image = $imagename;
        $activity->save();
        return redirect()->route('activity.index')->with('successMsg','Executive Committee Successfully Saved');

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
        $activity =   Activity::find($id);
        return view('admin/activity/edit',compact('activity'));
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
        $slug = Str::slug($request->title);
        $activity = Activity::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/activity'))
            {
                mkdir('uploads/activity', 0777 , true);
            }
            $image->move('uploads/activity',$imagename);
        }else {
            $imagename = $activity->image;
        }

        $activity->title = $request->title;

        $activity->slug = $slug;
        $activity->short = $request->short;
        $activity->sub_title = $request->sub_title;
        $activity->description = $request->description;
        $activity->image = $imagename;
        $activity->save();
        return redirect()->route('activity.index')->with('successMsg','Clients Say Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        if (file_exists('uploads/activity/'.$activity->image))
        {
            unlink('uploads/activity/'.$activity->image);
        }
        $activity->delete();
        return redirect()->back()->with('successMsg','Slider Successfully Deleted');
    }

    public function details($slug){
        $news = Activity::where('slug',$slug)->first();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/initiative.details',compact('news','main','footer','prnews','contact1','contact2','headoffice'));
    }

}
