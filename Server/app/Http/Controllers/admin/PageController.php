<?php

namespace App\Http\Controllers\Admin;

use App\Objects;
use App\Page;
use Carbon\Carbon;
use App\Menu;
use App\Others;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page =   Page::all();
        return view('admin.page.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_all   =   Menu::all();
        return view('admin.page.create',compact('menu_all'));
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
            'title_uri' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = $request->title_uri;
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/page'))
            {
                mkdir('uploads/page', 0777 , true);
            }
            $image->move('uploads/page',$imagename);
        }else {
            $imagename = '';
        }

        $page = new Page();
        $page->title = $request->title;
        $page->sub_title = $request->sub_title;
        $page->title_uri = $slug;
        $page->short = $request->short;
        $page->description = $request->description;
        $page->image = $imagename;
        $page->save();
        return redirect()->route('page.index')->with('successMsg','Page Successfully Saved');

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
        $page =   Page::find($id);
        $menu_all   =   Menu::all();

        $parent_root_id = Page::orderBy('id','DESC')
            ->where('title_uri',$page->title_uri)->first();
        $parent_id_for = Menu::orderBy('id','DESC')
            ->where('slug',$parent_root_id->title_uri)->first();

        return view('admin/page/edit',compact('page','menu_all','parent_id_for'));
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
            'title_uri' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = $request->title_uri;
        $page = Page::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/page'))
            {
                mkdir('uploads/page', 0777 , true);
            }
            $image->move('uploads/page',$imagename);
        }else {
            $imagename = $page->image;
        }

        $page->title = $request->title;
        $page->sub_title = $request->sub_title;
        $page->title_uri = $slug;
        $page->short = $request->short;
        $page->description = $request->description;
        $page->image = $imagename;
        $page->save();
        return redirect()->route('page.index')->with('successMsg','Page Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the page by ID
        $page = Page::find($id);

        if ($page) {
            // Path to the file
            $filePath = 'uploads/page/' . $page->image;

            // Check if the file exists and is a file (not a directory)
            if (file_exists($filePath) && is_file($filePath)) {
                // Attempt to delete the file
                if (unlink($filePath)) {
                    // Log or handle successful file deletion if needed
                } else {
                    // Handle the error if file deletion fails
                    // For example, you could log the error or add a flash message
                    // Log::error("Failed to delete file: $filePath");
                    // return redirect()->back()->with('errorMsg', 'Failed to delete the file.');
                }
            }

            // Delete the page record from the database
            $page->delete();

            // Redirect with a success message
            return redirect()->back()->with('successMsg', 'Page Successfully Deleted');
        } else {
            // Handle the case where the page was not found
            return redirect()->back()->with('errorMsg', 'Page not found.');
        }
    }


    public function details($slug){
        $page = Page::where('title_uri',$slug)->first();

        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();


        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/page.details',compact('objects2','objects','page','main','footer','contact1','contact2','headoffice'));
    }
}
