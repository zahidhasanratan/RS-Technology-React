<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function create($id)
    {
        $id = $id;
        return view('admin.technology.create', compact('id'));
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
            'title' => 'required',
        ]);

        // Create and save the FAQ
        $link = new Technology();
        $link->title = $request->title;
        $link->m_id = $request->m_id;
        $link->save();

        // Redirect back to the FAQ index page with the m_id
        return redirect()->to('admin/technology/'.$request->m_id)
            ->with('successMsg', 'Technology Successfully Saved');
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
        $faq = Technology::where('m_id', $id)->get();

        // Return the view with the fetched data (even if it's empty)
        return view('admin.technology.index', compact('faq','id'));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq =   Technology::find($id);
        return view('admin/technology/edit',compact('faq'));
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
            'title' => 'required'
        ]);

        $link = Technology::find($id);

        $link->title = $request->title;
        $link->sl = $request->sl;
        $link->save();
        return redirect()->to('admin/technology/'.$request->m_id)
            ->with('successMsg', 'Technology Successfully Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Technology::find($id);

        $link->delete();
        return redirect()->back()->with('successMsg','Technology Successfully Deleted');
    }
}
