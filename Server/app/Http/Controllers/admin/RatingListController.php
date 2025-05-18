<?php

namespace App\Http\Controllers\admin;

use App\Ratinglist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratinglist   =   Ratinglist::all();
        return view('admin.ratinglist.index',compact('ratinglist'));
    }

    public function create()
    {
        return view('admin.ratinglist.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',


        ]);

        $ratinglist = new Ratinglist();
        $ratinglist->title = $request->title;
        $ratinglist->save();
        return redirect()->route('ratinglist.index')->with('successMsg','Rating List Successfully Saved');
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
        $ratinglist =   Ratinglist::find($id);
        return view('admin/ratinglist/edit',compact('ratinglist'));
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
            'title' => 'required',


        ]);


        $ratinglist = Ratinglist::find($id);


        $ratinglist->title = $request->title;

        $ratinglist->save();
        return redirect()->route('ratinglist.index')->with('successMsg','Rating List Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ratinglist = Ratingtype::find($id);

        $ratinglist->delete();
        return redirect()->back()->with('successMsg','Rating List Successfully Deleted');
    }
}
