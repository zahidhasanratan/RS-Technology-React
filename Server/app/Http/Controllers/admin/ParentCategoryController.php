<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParentCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ParentCategory::all();
        return view('admin.pcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pcategory = new ParentCategory();
        $pcategory->name = $request->name;
        $pcategory->save();

        return redirect()->route('pcategory.index')
            ->with('successMsg', 'Parent Category Successfully Saved');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pcategory = ParentCategory::findOrFail($id);
        return view('admin.pcategory.edit', compact('pcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pcategory = ParentCategory::findOrFail($id);
        $pcategory->name = $request->name;
        $pcategory->save();

        return redirect()->route('pcategory.index')
            ->with('successMsg', 'Parent Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy($id)
//    {
//        $pcategory = ParentCategory::findOrFail($id);
//        $pcategory->delete();
//
//        return redirect()->back()->with('successMsg', 'Parent Category Successfully Deleted');
//    }

    public function destroy($id)
    {
        $pcategory = ParentCategory::findOrFail($id);

        // Check if this parent category has subcategories
        if ($pcategory->subCategories()->exists()) {
            return redirect()->back()->with('successMsg', 'Cannot delete. This parent category has subcategories.');
        }

        $pcategory->delete();

        return redirect()->back()->with('successMsg', 'Parent Category Successfully Deleted');
    }

}
