<?php

namespace App\Http\Controllers\frontend;

use App\Activity;
use App\Link;
use App\Menu;
use App\News;
use App\Rating;
use App\Service;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
//    public function __construct()
//    {
//
//        $this->middleware('guest:admin')->except('login');
//    }

    public function index()
    {

        $links  =   Link::all();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $news   =   News::orderBy('id','DESC')
            ->limit(7)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $rating   =   Rating::orderBy('id','DESC')

            ->get();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        return view('frontend/rating.list',compact('news','main','links','footer','prnews','articles','rating'));
    }

    public function login()
    {

        $links  =   Link::all();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $news   =   News::orderBy('id','DESC')
            ->limit(7)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        return view('frontend/rating.list',compact('news','main','links','footer','prnews','articles'));
    }

}
