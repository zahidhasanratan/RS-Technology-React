<?php

namespace App\Http\Controllers\admin;

use App\Menu;
use App\Others;
use App\Publication;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publication =   Publication::all();
        return view('admin.publication.index',compact('publication'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publication.create');
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
            if (!file_exists('uploads/publication'))
            {
                mkdir('uploads/publication', 0777 , true);
            }
            $image->move('uploads/publication',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $publication = new Publication();
        $publication->title = $request->title;

        $publication->date = $request->date;
        $publication->slug = $slug;
        $publication->short = $request->short;
        $publication->description = $request->description;
        $publication->image = $imagename;
        $publication->save();
        return redirect()->route('publication.index')->with('successMsg','Publication Successfully Saved');

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
        $publication =   Publication::find($id);
        return view('admin/publication/edit',compact('publication'));
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
        $publication = Publication::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/publication'))
            {
                mkdir('uploads/publication', 0777 , true);
            }
            $image->move('uploads/publication',$imagename);
        }else {
            $imagename = $publication->image;
        }

        $publication->title = $request->title;
        $publication->date = $request->date;

        $publication->slug = $slug;
        $publication->short = $request->short;
        $publication->description = $request->description;
        $publication->image = $imagename;
        $publication->save();
        return redirect()->route('publication.index')->with('successMsg','Publication Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::find($id);
        if (file_exists('uploads/publication/'.$publication->image))
        {
            unlink('uploads/publication/'.$publication->image);
        }
        $publication->delete();
        return redirect()->back()->with('successMsg','Publication Successfully Deleted');
    }
    public function details($slug){
        $publication = Publication::where('slug',$slug)->first();

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
        return view('frontend/publication.details',compact('contact2','headoffice','publication','main','contact1','footer'));
    }
}
