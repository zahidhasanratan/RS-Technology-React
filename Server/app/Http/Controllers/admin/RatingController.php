<?php

namespace App\Http\Controllers\admin;


use App\Activity;
use App\Industry;
use App\Link;
use App\Menu;
use App\Outlook;
use App\Rating;
use App\Ratinglist;
use App\Ratingtype;
use App\Sector;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rating =   Rating::all();
        return view('admin.rating.index',compact('rating'));
    }

    public function create()
    {
        $sector = Sector::all();
        $industry = Industry::all();
        $ratingtype = Ratingtype::all();
        $ratinglist = Ratinglist::all();
        $outlook = Outlook::all();
        return view('admin.rating.create',compact('sector','industry','ratingtype','ratinglist','outlook'));
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

        $slug = str_slug($request->title);


        $rating = new Rating();
        $rating->title = $request->title;
        $rating->slug = $slug;
        $rating->sector = $request->sector;
        $rating->industry = $request->industry;
        $rating->type = $request->type;
        $rating->rating = $request->rating;
        $rating->radingdate = $request->radingdate;
        $rating->outlook = $request->outlook;
        $rating->history = $request->history;
        $rating->action = $request->action;
        $rating->issue = $request->issue;


        $rating->save();
        return redirect()->route('rating.index')->with('successMsg','Rating Successfully Saved');

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
        $rating =   Rating::find($id);
        $sector = Sector::all();
        $industry = Industry::all();
        $ratingtype = Ratingtype::all();
        $ratinglist = Ratinglist::all();
        $outlook = Outlook::all();
        return view('admin/rating/edit',compact('rating','sector','industry','ratingtype','ratinglist','outlook'));
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

        $slug = str_slug($request->title);
        $rating = Rating::find($id);


        $rating->title = $request->title;
        $rating->sector = $request->sector;
        $rating->slug = $slug;
        $rating->industry = $request->industry;
        $rating->type = $request->type;
        $rating->rating = $request->rating;
        $rating->radingdate = $request->radingdate;
        $rating->outlook = $request->outlook;
        $rating->history = $request->history;
        $rating->action = $request->action;
        $rating->issue = $request->issue;

        $rating->save();
        return redirect()->route('rating.index')->with('successMsg','Rating Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Rating::find($id);
        $rating->delete();
        return redirect()->back()->with('successMsg','Rating Successfully Deleted');
    }

    public function details($slug){
        $rating = Rating::where('slug',$slug)->first();

        $main   =   Menu::orderBy('id','DESC')
            ->where('display',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $links  =   Link::all();
        if (Auth::guard('admin')->check())
        return view('frontend/rating.details',compact('rating','main','footer','articles','prnews','links'));
        else
            return redirect('/');
    }
}
