<?php

namespace App\Http\Controllers\frontend;

use App\Activity;
use App\Admin;
use App\Category;
use App\Link;
use App\Menu;
use App\News;
use App\Service;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{



    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
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
        return view('frontend/registration.registration',compact('sliders','categories','news','main','links','footer','prnews','articles'));
    }

    public function pending()
    {
        $sliders = Slider::all();
        $categories = Category::all();
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
        return view('frontend/registration.index',compact('sliders','categories','news','main','links','footer','prnews','articles'));
    }

    public function registration(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'email' =>  'required | email | max:255',
            'company' => 'required',
        ]);



        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->company = $request->company;

        $admin->save();
      return redirect()->route('ragistration.index')->with('successMsg','Ragistration Successfully Saved');


    }


}
