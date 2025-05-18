<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FaqModel;
use App\Models\PakcagePricingModel;
use Illuminate\Http\Request;

class PackagePriceController extends Controller
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
        return view('admin.packageprice.create', compact('id'));
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
        $link = new PakcagePricingModel();
        $link->title = $request->title;
        $link->sub_title = $request->sub_title;
        $link->price = $request->price;
        $link->field1 = $request->field1;
        $link->field2 = $request->field2;
        $link->field3 = $request->field3;
        $link->field4 = $request->field4;
        $link->field5 = $request->field5;
        $link->field6 = $request->field6;
        $link->field7 = $request->field7;
        $link->field8 = $request->field8;
        $link->field9 = $request->field9;
        $link->m_id = $request->m_id;
        $link->save();

        // Redirect back to the FAQ index page with the m_id
        return redirect()->to('admin/packagepricing/'.$request->m_id)
            ->with('successMsg', 'Package Price Successfully Saved');
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
        $faq = PakcagePricingModel::where('m_id', $id)->get();

        // Return the view with the fetched data (even if it's empty)
        return view('admin.packageprice.index', compact('faq','id'));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq =   PakcagePricingModel::find($id);
        return view('admin/packageprice/edit',compact('faq'));
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

        $link = PakcagePricingModel::find($id);

        $link->title = $request->title;
        $link->sub_title = $request->sub_title;
        $link->price = $request->price;
        $link->field1 = $request->field1;
        $link->field2 = $request->field2;
        $link->field3 = $request->field3;
        $link->field4 = $request->field4;
        $link->field5 = $request->field5;
        $link->field6 = $request->field6;
        $link->field7 = $request->field7;
        $link->field8 = $request->field8;
        $link->field9 = $request->field9;
        $link->sl = $request->sl;
        $link->save();
        return redirect()->to('admin/packagepricing/'.$request->m_id)
            ->with('successMsg', 'Package Price Successfully Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = PakcagePricingModel::find($id);

        $link->delete();
        return redirect()->back()->with('successMsg','Package Price Successfully Deleted');
    }
}
