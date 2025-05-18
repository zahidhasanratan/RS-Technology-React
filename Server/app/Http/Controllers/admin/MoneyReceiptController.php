<?php

namespace App\Http\Controllers\admin;

use App\MoneyReceipt;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class MoneyReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->id ==2){
        $money =   MoneyReceipt::all();
        }
        else{
        $money =   MoneyReceipt::where('userid',Auth::user()->id)->get();
        }

        return view('admin.money.index',compact('money'));
    }


    public function alluser($id)
    {

       $money =   MoneyReceipt::where('userid',$id)->get();
        return view('admin.money.index',compact('money'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.money.create');
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
            'issuing_office' => 'required',
        ]);
        $money = new MoneyReceipt();
        $money->issuing_office = $request->issuing_office;
        $money->money_receipt_no = $request->money_receipt_no;
        $money->class_of_insurance = $request->class_of_insurance;
        $money->thanks_from = $request->thanks_from;
        $money->mode_of_payement = $request->mode_of_payement;
        $money->dated = $request->dated;
        $money->drawn_on = $request->drawn_on;
        $money->issue_against = $request->issue_against;
        $money->Premium = $request->Premium;
        $money->stamp = $request->stamp;
        $money->userid = $request->userid;
        $money->vat = $request->vat;
        $money->total =  $request->stamp + $request->Premium + $request->vat;
        $money->sum_of_tk = $request->stamp + $request->Premium + $request->vat;
        $money->save();
        return redirect()->route('money_receipt.index')->with('successMsg','Money Receipt Successfully Saved');
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
        $slider =   MoneyReceipt::find($id);
        return view('admin/money/edit',compact('slider'));
    }

    public function details($id)
    {
//        echo 'http://m.apgicl.com/money/receipt/'.$id;

        $urlweb = url()->full();
        $money =   MoneyReceipt::find($id);
//        $url = 'https://example.com';
//        $url = $urlweb;
        $url = 'http://m.apgicl.com/Ho/Yesg/'.$id;

        $qrCode = QrCode::size(150)->generate($url);
       return view('admin/money/details',compact('money','qrCode'));


    }


    public function pdf($id)
    {
        $urlweb = url()->full();
        $money =   MoneyReceipt::find($id);
//        $url = 'https://example.com';
        $url = 'http://m.apgicl.com/Ho/Yesg/'.$id;
        $qrCode = QrCode::size(100)->generate($url);

//        return view('admin/money/details',compact('money','qrCode'));

        $money =   MoneyReceipt::find($id);
        $data = ['title' => 'My PDF Title'];
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('admin.money.invoice', compact('money','qrCode'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream();

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
            'issuing_office' => 'required',
        ]);
        $money = MoneyReceipt::find($id);
        $money->issuing_office = $request->issuing_office;
        $money->money_receipt_no = $request->money_receipt_no;
        $money->class_of_insurance = $request->class_of_insurance;
        $money->thanks_from = $request->thanks_from;
        $money->mode_of_payement = $request->mode_of_payement;
        $money->dated = $request->dated;
        $money->drawn_on = $request->drawn_on;
        $money->issue_against = $request->issue_against;
        $money->Premium = $request->Premium;
        $money->stamp = $request->stamp;
        $money->vat = $request->vat;
        $money->total = $request->vat + $request->stamp + $request->Premium;
        $money->sum_of_tk = $request->vat + $request->stamp + $request->Premium;
        $money->save();
        return redirect()->route('money_receipt.index')->with('successMsg','Money Receipt Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = MoneyReceipt::find($id);
        $slider->delete();
        return redirect()->back()->with('successMsg','Money Receipt Successfully Deleted');
    }
}
