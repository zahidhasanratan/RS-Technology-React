<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import Str class
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name); // Use Str::slug

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 0777, true);
            }
            $image->move('uploads/item', $imagename);
        } else {
            $imagename = "default.png";
        }

        $item = new Item();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image = $imagename;
        $item->save();

        return redirect()->route('item.index')->with('successMsg', 'Item Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Implementation for showing a specific resource
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit', compact('item', 'categories'));
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
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $item = Item::find($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name); // Use Str::slug

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 0777, true);
            }
            // Delete the old image if it exists
            if (file_exists('uploads/item/' . $item->image)) {
                unlink('uploads/item/' . $item->image);
            }
            $image->move('uploads/item', $imagename);
        } else {
            $imagename = $item->image;
        }

        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image = $imagename;
        $item->save();

        return redirect()->route('item.index')->with('successMsg', 'Item Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (file_exists('uploads/item/' . $item->image)) {
            unlink('uploads/item/' . $item->image);
        }
        $item->delete();
        return redirect()->back()->with('successMsg', 'Item Successfully Deleted');
    }
}
