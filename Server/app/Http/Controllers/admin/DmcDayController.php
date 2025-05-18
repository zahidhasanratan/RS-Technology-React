<?php

namespace App\Http\Controllers\Admin;

use App\Dmcday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DmcDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news =   Dmcday::where('display',1)->get();
        return view('admin.dmcday.index',compact('news'));
    }

    public function report()
    {
        $news =   Dmcday::where('display',1)->get();
        return view('admin.dmcday.report',compact('news'));
    }

    public function report_search(Request $request)
    {
        if ($request->acoompany != '') {
            $query = Dmcday::where('display', 1);
            $news = $query->get();

// Calculate totals based on selected values
            $totalSpouse = 0;
            $totalBelowPerson = 0;
            $totalAbovePerson = 0;
            $totalApplicants = 0;

            $accompany = $request->acoompany;

            foreach ($news as $item) {
                if ($accompany == 'all' || $accompany == 'spouse') {
                    if ($item->spouse != '') {
                        $totalSpouse++;
                    }
                }

                if ($accompany == 'all' || $accompany == 'belowperson') {
                    $totalBelowPerson += $item->free;
                }

                if ($accompany == 'all' || $accompany == 'aboveperson') {
                    $totalAbovePerson += $item->plus10;
                }

                if ($accompany == 'all') {
                    $totalApplicants++;
                }
            }

            return view('admin.dmcday.report_search_calculate', compact('news', 'totalSpouse', 'totalBelowPerson', 'totalAbovePerson', 'totalApplicants', 'accompany'));


        }
        else{
            $query = Dmcday::where('display', 1);
            $query->where(function ($q) use ($request) {
                if ($request->batch != '') {
                    $q->where('batch', '=', $request->batch);
                }
                if ($request->size != '') {
//                    $q->orWhere('size', 'like', '%' . $request->size . '%');
                    $q->where('size', '=', $request->size);
                }
                if ($request->gender != '') {
//                    $q->Where('gender', 'like', '%' . $request->gender . '%');
                    $q->where('gender', '=', $request->gender);
                }
                if ($request->game != '') {
//                    $q->orWhere('game', 'like', '%' . $request->game . '%');
                    $q->where('game', '=', $request->game);
                }
                if ($request->lifemember != '') {
                    $q->orWhere('lifemember', 'like', '%' . $request->lifemember . '%');
                }
            });

            $news = $query->get();
            return view('admin.dmcday.report_search', compact('news'));


//            $query = Dmcday::where('display', 1);
//            if ($request->batch != '') {
////                $query->orWhere('batch', 'like', '%' . $request->batch . '%');
//                $query->where('batch', '=', $request->batch);
//
//            }
//            if ($request->size != '') {
//                $query->orwhere('size', 'like', '%' . $request->size . '%');
//            }
//            if ($request->gender != '') {
//                $query->orwhere('gender', 'like', '%' . $request->gender . '%');
//            }
//            if ($request->game != '') {
//                $query->orwhere('game', 'like', '%' . $request->game . '%');
//            }
//            if ($request->lifemember != '') {
//                $query->orwhere('lifemember', 'like', '%' . $request->lifemember . '%');
//            }
//            $news = $query->get();
//            return view('admin.dmcday.report_search', compact('news'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news =   Dmcday::where('display',0)->get();
        return view('admin.dmcday.pending',compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $news = Dmcday::find($id);
        $news->delete();
        return redirect()->back()->with('successMsg','DMC Pending Perticipate Deleted');
    }
}
