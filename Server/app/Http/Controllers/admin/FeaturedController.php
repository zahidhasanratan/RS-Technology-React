<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = $id;
        return view('admin.featured.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => [
                'nullable',
                'file',
                'max:2048',
                function ($attribute, $value, $fail) use ($request) {
                    $file = $request->file('image');
                    if ($file && $file->getClientOriginalExtension() === 'svg' && $file->getMimeType() !== 'image/svg+xml') {
                        $fail('The file must be a valid SVG.');
                    }
                },
            ],
            'short' => 'nullable|string|max:500',
            'description' => 'nullable|string'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $imagename = 'default.png'; // Default image name

        // Handle image upload
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $extension = $image->getClientOriginalExtension();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $extension;

            $uploadPath = public_path('uploads/featured');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            if ($extension === 'svg') {
                // Sanitize SVG
                $sanitizer = new Sanitizer();
                $sanitizedSvg = $sanitizer->sanitize(file_get_contents($image->getPathname()));

                if ($sanitizedSvg) {
                    file_put_contents($uploadPath . '/' . $imagename, $sanitizedSvg);
                } else {
                    return redirect()->back()->withErrors(['image' => 'Invalid SVG file.']);
                }
            } else {
                $image->move($uploadPath, $imagename);
            }
        }

        // Save to database
        $featured = new FeaturedModel();
        $featured->title = $request->title;
        $featured->short = $request->short;
        $featured->url = $request->url;
        $featured->slug = $slug;
        $featured->image = $imagename;
        $featured->description = $request->description;
        $featured->m_id = $request->m_id;
        $featured->save();

        // Redirect with success message
        return redirect()->to('admin/featured/' . $request->m_id)
            ->with('successMsg', 'Featured Work Successfully Saved');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Validate if $id exists and is numeric
        if (!is_numeric($id)) {
            abort(404, 'Invalid ID');
        }
        $id = $id;
        // Fetch FAQs associated with the given m_id
        $faq = FeaturedModel::where('m_id', $id)->get();

        // Return the view with the fetched data (even if it's empty)
        return view('admin.featured.index', compact('faq','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq =   FeaturedModel::find($id);
        return view('admin/featured/edit',compact('faq'));
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
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => [
                'nullable',
                'file',
                'max:2048',
                function ($attribute, $value, $fail) use ($request) {
                    $file = $request->file('image');
                    if ($file && $file->getClientOriginalExtension() === 'svg' && $file->getMimeType() !== 'image/svg+xml') {
                        $fail('The file must be a valid SVG.');
                    }
                },
            ],
            'short' => 'nullable|string|max:500',

            'description' => 'nullable|string',
        ]);

        // Find the existing record
        $featured = FeaturedModel::findOrFail($id);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $imagename = $featured->image; // Default to existing image

        // Handle image upload
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $extension = $image->getClientOriginalExtension();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $extension;

            $uploadPath = public_path('uploads/featured');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            if ($extension === 'svg') {
                // Sanitize SVG
                $sanitizer = new Sanitizer();
                $sanitizedSvg = $sanitizer->sanitize(file_get_contents($image->getPathname()));

                if ($sanitizedSvg) {
                    file_put_contents($uploadPath . '/' . $imagename, $sanitizedSvg);
                } else {
                    return redirect()->back()->withErrors(['image' => 'Invalid SVG file.']);
                }
            } else {
                $image->move($uploadPath, $imagename);
            }

            // Delete the old image
            if ($featured->image && $featured->image !== 'default.png' && file_exists($uploadPath . '/' . $featured->image)) {
                unlink($uploadPath . '/' . $featured->image);
            }
        }

        // Update fields in the database
        $featured->title = $request->title;
        $featured->short = $request->short;
        $featured->url = $request->url;
        $featured->slug = $slug;
        $featured->image = $imagename;
        $featured->description = $request->description;
        $featured->save();

        // Redirect with success message
        return redirect()->to('admin/featured/' . $featured->m_id)
            ->with('successMsg', 'Featured Work Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = FeaturedModel::find($id);
        if (file_exists('uploads/featured/'.$service->image))
        {
            unlink('uploads/featured/'.$service->image);
        }
        $service->delete();
        return redirect()->back()->with('successMsg','Featgured Successfully Deleted');
    }
}
