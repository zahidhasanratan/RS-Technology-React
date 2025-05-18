<?php

namespace App\Http\Controllers\admin;

use App\LifeMember;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LifeMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news =   LifeMember::all();
        return view('admin.life.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.life.create');
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
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/life'))
            {
                mkdir('uploads/life', 0777 , true);
            }
            $image->move('uploads/life',$imagename);
        }else {
            $imagename = '';
        }
        $service = new LifeMember();
        $service->Name = $request->title;
        $service->LM_No = $request->LM_No;
        $service->Batch = $request->Batch;
        $service->Address = $request->Address;
        $service->Address3 = $request->Address3;
        $service->Address1 = $request->Address1;
        $service->email = $request->email;
        $service->phone = $request->phone;
        $service->image = $imagename;
        $service->save();
        return redirect()->route('life.index')->with('successMsg','Life Member Successfully Saved');
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
        $news =   LifeMember::find($id);
        return view('admin/life/edit',compact('news'));
    }

    public function view($id)
    {
        $slug = $id;
        $service =   Service::find($id);

        return view('admin/service/view',compact('service','slug'));
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
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $news = LifeMember::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/life'))
            {
                mkdir('uploads/life', 0777 , true);
            }
            $image->move('uploads/life',$imagename);
        }else {
            $imagename = $news->image;
        }

        $news->Name = $request->title;
        $news->LM_No = $request->LM_No;
        $news->Batch = $request->Batch;
        $news->Address = $request->Address;
        $news->Address3 = $request->Address3;
        $news->Address1 = $request->Address1;
        $news->email = $request->email;
        $news->phone = $request->phone;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('life.index')->with('successMsg','Life Member Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = LifeMember::find($id);
        if (file_exists('uploads/life/'.$service->image))
        {
            unlink('uploads/life/'.$service->image);
        }
        $service->delete();
        return redirect()->back()->with('successMsg','Life Member Successfully Deleted');
    }

    public function details($slug){
        $news = Service::where('slug',$slug)->first();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
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

        return view('frontend/service.details',compact('main','objects2','contact1','footer','prnews','news'));
    }
}
