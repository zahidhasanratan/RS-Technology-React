<?php

namespace App\Http\Controllers\admin;

use App\Others;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OthersController extends Controller
{
    public function index()
    {
        $others   =   Others::all();
        return view('admin.others.index',compact('others'));
        //
    }

    public function edit($id)
    {
        $others =   Others::find($id);
        return view('admin/others/edit',compact('others'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
//            'slug' => 'nullable|string|max:255', // Slug is optional
//            'phone' => 'nullable|string|max:20', // Add your desired validation rules
//            'description' => 'nullable|string',
        ]);

        // Find the page by ID
        $page = Others::findOrFail($id); // Use findOrFail for proper error handling

        // Update the page fields
        $page->title = $request->title;
        $page->title2 = $request->title2;
        $page->slug = $request->slug ?? str($request->title);
        $page->phone = $request->phone;
        $page->slug2 = $request->slug2;
        $page->working = $request->working;
        $page->description = $request->description;

        // Save the changes
        $page->save();

        return redirect(url("admin/others/{$id}/edit"))
            ->with('successMsg', 'Successfully Updated');
    }


}
