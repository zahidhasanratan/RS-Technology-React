<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClientsBenifitsModel;
use Illuminate\Http\Request;

class ClientBenifitsController extends Controller
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
        return view('admin.clientbenifits.create', compact('id'));
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
        $link = new ClientsBenifitsModel();
        $link->title = $request->title;
        $link->description = $request->description;
        $link->m_id = $request->m_id;
        $link->save();

        // Redirect back to the FAQ index page with the m_id
        return redirect()->to('admin/clilentbenifts/'.$request->m_id)
            ->with('successMsg', 'Client Benifits Successfully Saved');
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
        $faq = ClientsBenifitsModel::where('m_id', $id)->get();

        // Return the view with the fetched data (even if it's empty)
        return view('admin.clientbenifits.index', compact('faq','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq =   ClientsBenifitsModel::find($id);
        return view('admin/clientbenifits/edit',compact('faq'));
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

        $link = ClientsBenifitsModel::find($id);

        $link->title = $request->title;
        $link->description = $request->description;
        $link->sl = $request->sl;
        $link->save();
        return redirect()->to('admin/clilentbenifts/'.$request->m_id)
            ->with('successMsg', 'Client Benifits Successfully Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = ClientsBenifitsModel::find($id);

        $link->delete();
        return redirect()->back()->with('successMsg','CLient Benifits Successfully Deleted');
    }
}
