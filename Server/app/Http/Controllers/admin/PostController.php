<?php

namespace App\Http\Controllers\admin;

use App\Menu;
use App\Objects;
use App\Others;
use App\Post;
use App\Research;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news =   Post::all();
        return view('admin.post.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
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
            'image' => 'mimes:jpeg,jpg,bmp,png,gif,svg,webp',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/article'))
            {
                mkdir('uploads/post', 0777 , true);
            }
            $image->move('uploads/post',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $news = new Post();
        $news->title = $request->title;
        $news->slug = $slug;
        $news->location = $request->location;
        $news->link = $request->link;
        $news->description = $request->description;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('post.index')->with('successMsg','Post Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $news = Post::where('slug',$slug)->first();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
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
        return view('frontend/post.show',compact('objects2','contact2','headoffice','news','main','contact1','footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news =   Post::find($id);
        return view('admin/post/edit',compact('news'));
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
            'image' => 'mimes:jpeg,jpg,bmp,png,gif,svg,webp',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        $news = Post::find($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/.', 0777 , true);
            }
            $image->move('uploads/.',$imagename);
        }else {
            $imagename = $news->image;
        }
        $news->title = $request->title;
        $news->slug = $slug;
        $news->location = $request->location;
        $news->link = $request->link;
        $news->sequence = $request->sequence;
        $news->description = $request->description;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('post.index')->with('successMsg','Research Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = Post::find($id);
        if (file_exists('uploads/post/'.$news->image))
        {
            unlink('uploads/post/'.$news->image);
        }
        $news->delete();
        return redirect()->back()->with('successMsg','Post Successfully Deleted');
    }
    public function details($slug){
        $news = Post::where('slug',$slug)->first();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
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
        return view('frontend/post.details',compact('objects2','contact2','headoffice','news','main','contact1','footer'));
    }
}
