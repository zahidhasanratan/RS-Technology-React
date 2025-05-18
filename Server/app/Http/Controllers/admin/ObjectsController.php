<?php

namespace App\Http\Controllers\admin;

use App\Menu;
use App\Objects;
use App\Others;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObjectsController extends Controller
{
    public function index()
    {
        $objects   =   Objects::all();
        return view('admin.objects.index',compact('objects'));
        //
    }

    public function edit($id)
    {
        $objects =   Objects::find($id);
        return view('admin/objects/edit',compact('objects'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,bmp|max:2048',
            'image2' => 'mimes:jpeg,jpg,png,bmp|max:2048',
            'image3' => 'mimes:jpeg,jpg,png,bmp|max:2048',
        ]);

        $page = Objects::findOrFail($id);

        $slug = Str::slug($request->title);
        $currentDate = Carbon::now()->toDateString();

        // Handle Image 1
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $slug . '-1-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/object', $imageName);
        } else {
            $imageName = $page->image;
        }

        // Handle Image 2
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = $slug . '-2-' . $currentDate . '-' . uniqid() . '.' . $image2->getClientOriginalExtension();
            $image2->move('uploads/object', $imageName2);
        } else {
            $imageName2 = $page->image2;
        }

        // Handle Image 3
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = $slug . '-3-' . $currentDate . '-' . uniqid() . '.' . $image3->getClientOriginalExtension();
            $image3->move('uploads/object', $imageName3);
        } else {
            $imageName3 = $page->image3;
        }

        // Update object data
        $page->title = $request->title;
        $page->slug = $slug;
        $page->sub_title = $request->sub_title;
        $page->sub_title2 = $request->sub_title2;
        $page->phone = $request->phone;
        $page->short = $request->short;
        $page->description = $request->description;
        $page->image = $imageName;
        $page->image2 = $imageName2;
        $page->image3 = $imageName3;
        $page->save();

        return redirect()->route('objects.edit', $page->id)->with('successMsg', 'Successfully Updated');
    }

    public function details($slug){
        $page = Objects::where('slug',$slug)->first();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
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

        return view('frontend/objects.details',compact('page','main','footer','objects','contact1','contact2','headoffice'));
    }
}
