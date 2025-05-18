<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WebProcessModel;
use Illuminate\Http\Request;

class WebProcessController extends Controller
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
        return view('admin.webprocess.create', compact('id'));
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
        $link = new WebProcessModel();
        $link->title = $request->title;
        $link->description = $request->description;
        $link->m_id = $request->m_id;
        $link->save();

        // Redirect back to the FAQ index page with the m_id
        return redirect()->to('admin/webprocess/'.$request->m_id)
            ->with('successMsg', 'Process Successfully Saved');
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
        $faq = WebProcessModel::where('m_id', $id)->get();

        // Return the view with the fetched data (even if it's empty)
        return view('admin.webprocess.index', compact('faq','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq =   WebProcessModel::find($id);
        return view('admin/webprocess/edit',compact('faq'));
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

        $link = WebProcessModel::find($id);

        $link->title = $request->title;
        $link->description = $request->description;
        $link->sl = $request->sl;
        $link->save();
        return redirect()->to('admin/webprocess/'.$request->m_id)
            ->with('successMsg', 'Process Successfully Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = WebProcessModel::find($id);

        $link->delete();
        return redirect()->back()->with('successMsg','Process Successfully Deleted');
    }
}
