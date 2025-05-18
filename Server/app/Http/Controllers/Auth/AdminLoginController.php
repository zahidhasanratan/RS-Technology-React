<?php

namespace App\Http\Controllers\Auth;


use App\Industry;
use App\Menu;
use App\Link;
use App\News;
use App\Outlook;
use App\Rating;
use App\Ratinglist;
use App\Ratingtype;
use App\Sector;
use App\Service;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
//    public function __construct()
//    {
//
//        $this->middleware('auth:admin')->except('login');
//    }


    public function index()
    {

        $links  =   Link::all();
        $rating  =   Rating::all();
        $sector  =   Sector::all();
        $industry  =   Industry::all();
        $ratingtype  =   Ratingtype::all();
        $ratinglist  =   Ratinglist::all();
        $outlook  =   Outlook::all();


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


       if (Auth::guard('admin')->check())
        return view('frontend/rating.list',compact('news','main','links','footer','prnews','articles','rating','sector','industry','ratingtype','ratinglist','outlook'));
   else
        return redirect('/');
    }


    public function showLoginForm()
    {
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        return view('frontend/registration.registration',compact('main','footer'));
    }
    public function login(Request $request)
    {

        $this->validate($request, [
            'email' =>  'required | email',
            'password'  =>  'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])){
            return redirect()->intended(route('rating.dashboard'));


        }
        elseif (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => NULL])){
            return redirect()->intended(route('ragistration.index'));


        }

         return redirect()->back()->withInput($request->only('email'));

    }

//    public function logout()
//    {
//        Auth::guard('admins')->logout();
//
//
//        return redirect('/rating-information/login');
//    }
//    public function logout(Request $request)
//    {
//        Auth::guard('admin')->logout();
//
//        $request->session()->invalidate();
//
//        return redirect('/');
//    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/rating-information/login');
    }
}
