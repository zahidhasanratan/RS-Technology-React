<?php

namespace App\Http\Controllers\frontend;

use App\Activity;
use App\Category;
use App\CompanyManagement;
use App\ContactUs;
use App\Dmcday;
use App\LifeMember;
use App\Item;
use App\Mail\ContactFormMail;
use App\Mail\DmcMail;
use App\MecroFinance;
use App\MedicalFeature;
use App\MedicalSlider;
use App\MicroSLider;
use App\Mission;
use App\NeedHelp;
use App\photo_gallery_table;
use App\Industry;
use App\Link;
use App\Menu;
use App\News;
use App\Objects;
use App\Others;
use App\Outlook;
use App\PreviousProgram;
use App\Publication;
use App\Rating;
use App\Ratinglist;
use App\Ratingtype;
use App\Sector;
use App\Service;
use App\Slider;
use App\Team;
use App\video;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::orderBy('id','DESC')->limit(2)->get();
        $video   =   video::orderBy('id','DESC')->limit(2)->get();
        $links  =   Link::all();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $activity   =   Activity::orderBy('id','DESC')

            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $service   =   Service::orderBy('id','ASC')

            ->get();
        $news   =   News::orderBy('id','DESC')
            ->limit(7)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/home.index',compact('sliders','video','contact1','activity','service','categories','news','main','links','footer','objects','objects2','contact1','contact2','headoffice'));
    }
    
    public function day()
    {
        $sliders = Slider::all();
        $categories = Category::orderBy('id','DESC')->limit(2)->get();
        $video   =   video::orderBy('id','DESC')->limit(2)->get();
        $links  =   Link::all();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $activity   =   Activity::orderBy('id','DESC')

            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $service   =   Service::orderBy('id','ASC')

            ->get();
        $news   =   News::orderBy('id','DESC')
            ->limit(7)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/home.day',compact('sliders','video','contact1','activity','service','categories','news','main','links','footer','objects','objects2','contact1','contact2','headoffice'));
    }

    function facility()
    {
        $sliders = Slider::all();
        $categories = Category::orderBy('id','DESC')->limit(2)->get();
        $video   =   video::orderBy('id','DESC')->limit(2)->get();
        $links  =   LifeMember::all();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $activity   =   Activity::orderBy('id','DESC')

            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $service   =   Service::orderBy('id','ASC')

            ->get();
        $news   =   News::orderBy('id','DESC')
            ->limit(7)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/home.facility',compact('sliders','video','contact1','activity','service','categories','news','main','links','footer','objects','objects2','contact1','contact2','headoffice'));
    }

     public function lifemember()
    {
        $sliders = Slider::all();
        $categories = Category::orderBy('id','DESC')->limit(2)->get();
        $video   =   video::orderBy('id','DESC')->limit(2)->get();
        $links  =   LifeMember::all();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();

        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $activity   =   Activity::orderBy('id','DESC')

            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $service   =   Service::orderBy('id','ASC')

            ->get();
        $news   =   News::orderBy('id','DESC')
            ->limit(7)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/home.lifemember',compact('sliders','video','contact1','activity','service','categories','news','main','links','footer','objects','objects2','contact1','contact2','headoffice'));
    }
    public function medical()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();
        $medicalslider = MedicalSlider::orderBy('id','ASC')
            ->get();
        $medicalfeature = MedicalFeature::orderBy('id','ASC')
            ->get();
        $medicalfeaturedata = MedicalFeature::orderBy('id','ASC')
            ->get();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        return view('frontend/medical.all',compact('news','publication','medicalfeature','medicalfeaturedata','medicalslider','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function rangpur()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();
        $medicalslider = MicroSLider::orderBy('id','ASC')
            ->get();
        $medicalfeature = MecroFinance::orderBy('id','ASC')
            ->get();
        $medicalfeaturedata = MecroFinance::orderBy('id','ASC')
            ->get();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        return view('frontend/micro.rangpur',compact('objects2','news','publication','medicalfeature','medicalfeaturedata','medicalslider','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }
    public function micro()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();
        $medicalslider = MicroSLider::orderBy('id','ASC')
            ->get();
        $medicalfeature = MecroFinance::orderBy('id','ASC')
            ->get();
        $medicalfeaturedata = MecroFinance::orderBy('id','ASC')
            ->get();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        return view('frontend/micro.dhaka',compact('objects2','news','publication','medicalfeature','medicalfeaturedata','medicalslider','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }


    public function all_news()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/news.all',compact('news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function all_notice()
    {
        $news   =   Service::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/service.all',compact('news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function districtcommittee()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/member.districtcommittee',compact('news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function need_help()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/need.help',compact('news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function memberlist()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
//        $team  =   Team::where('Approved','1')->all();
        $team  = Team::orderBy('id','ASC')
            ->where('Approved',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/member.list',compact('team','news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function reportsearch(Request $request)
    {

        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
//        $team  =   Team::where('Approved','1')->all();
        $team  = Team::orderBy('id','ASC')
            ->where('Approved',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        //$search =   $request->get('name');
        $ratings  =   Team::orderBy('id','ASC')
            ->where('Name',$request->name)
            ->orwhere('MobileNo',$request->mobile_no)
            ->get();

        return view('frontend/member.reportsearch',compact('ratings','team','news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function famous()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
//        $team  =   Team::where('Approved','1')->all();
        $team  = Team::orderBy('id','ASC')
            ->where('Approved',1)
            ->get();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/member.famous',compact('team','news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }


    public function memberdetails($slug)
    {
        $teamdetails = Team::where('slug',$slug)->first();
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $team  =   Team::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/member.details',compact('teamdetails','team','news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }


    public function committeedetails($slug)
    {
        $slug = $slug;
        $teamdetails = Team::where('slug',$slug)->first();
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $team  =   Team::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/member.committeedetails',compact('slug','teamdetails','team','news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function memberform()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $publication   =   Publication::orderBy('id','DESC')

            ->get();

        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/member.form',compact('news','objects2','publication','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function team()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $company   =   CompanyManagement::orderBy('id','ASC')

            ->get();
        $team   =   Team::orderBy('id','ASC')
            ->where('type','Main')
            ->get();
        $micro   =   Team::orderBy('id','ASC')
            ->where('type','Microfinance')
            ->get();
        $medical   =   Team::orderBy('id','ASC')
            ->where('type','Medical')
            ->get();

        $companydata   =   CompanyManagement::orderBy('id','ASC')

            ->get();
        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $objects3  =   Objects::orderBy('id','ASC')
            ->where('id',3)
            ->get();

        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        return view('frontend/team.all',compact('news','company','team','micro','medical','companydata','objects3','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function previous()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $company   =   CompanyManagement::orderBy('id','ASC')

            ->get();
        $team   =   Team::orderBy('id','ASC')
            ->where('type','Main')
            ->get();
        $previous   =   PreviousProgram::orderBy('id','ASC')

            ->get();
        $medical   =   Team::orderBy('id','ASC')
            ->where('type','Medical')
            ->get();

        $companydata   =   CompanyManagement::orderBy('id','ASC')

            ->get();
        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $objects3  =   Objects::orderBy('id','ASC')
            ->where('id',3)
            ->get();

        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        return view('frontend/previous.all',compact('news','company','team','previous','medical','companydata','objects3','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }


    public function executive()
    {
        $news   =   News::orderBy('id','DESC')

            ->get();
        $company   =   CompanyManagement::orderBy('id','ASC')

            ->get();
        $companydata   =   CompanyManagement::orderBy('id','ASC')

            ->get();
        $allnews   =   News::orderBy('id','DESC')

            ->get();

        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $objects3  =   Objects::orderBy('id','ASC')
            ->where('id',3)
            ->get();

        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();
        return view('frontend/company.all',compact('news','company','companydata','objects3','main','contact1','contact2','footer','articles','prnews','links','allnews'));
    }

    public function initative()
    {
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/initiative.all',compact('initative','main','footer','articles','allprnews','links','contact1','contact2','headoffice'));
    }


    public function invoice($slug)
    {

        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        $invoice = Dmcday::where('random',$slug)->first();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/home.invoice',compact('objects2','invoice','initative','main','footer','articles','allprnews','links','contact1','contact2','headoffice'));
    }


    public function ticket($slug)
    {
        $invoice = Dmcday::where('random',$slug)->where('display',1)->first();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

//        return view('frontend/home.ticket',compact('invoice','initative','main','footer','articles','allprnews','links','contact1','contact2','headoffice'));



//        $pdf = new Dompdf();
//        $pdf->loadHtml(View::make('frontend.home.ticket', compact('main'))->render());
//        $pdf->setPaper('A4', 'portrait');
//        $pdf->render();
//        return $pdf->stream();

//        $pdf = new Dompdf();
//        $pdf->loadHtml(View::make('frontend.home.ticket', compact('main'))->render());
//        $pdf->setPaper('A4', 'portrait');
//        $pdf->render();
//        $response = $pdf->output();
//        $response->header('Content-Type', 'application/pdf');
//        return $response;

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('frontend.home.ticket', compact('invoice'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdfContent = $pdf->output();
        $response = response($pdfContent)->header('Content-Type', 'application/pdf')->header('Content-Disposition', 'inline');

        return $response;
    }


    public function career()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/career.all',compact('initative','main','footer','career','allprnews','links','contact1','contact2','headoffice'));
    }


    public function contact()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $contactus   =   ContactUs::orderBy('id','DESC')

            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/contact.all',compact('objects','objects2','initative','main','contactus','footer','career','allprnews','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }

    public function success($slug)
    {
        $invoice = Dmcday::where('random',$slug)->first();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/home.success',compact('invoice','initative','main','footer','articles','allprnews','links','contact1','contact2','headoffice'));
    }

    public function success2($slug)
    {
        $invoice = Dmcday::where('random',$slug)->first();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return redirect(route('dmcday.create',compact('invoice','initative','main','footer','articles','allprnews','links','contact1','contact2','headoffice'))) ;
    }

    public function successmessage()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $contactus   =   ContactUs::orderBy('id','DESC')

            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/home.successmessage',compact('objects','objects2','initative','main','contactus','footer','career','allprnews','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }
    public function failed()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $contactus   =   ContactUs::orderBy('id','DESC')

            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/home.failed',compact('objects','objects2','initative','main','contactus','footer','career','allprnews','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }

    public function contactmail(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);
        Mail::to('info@zahid.com.bd')->send(new ContactFormMail($data));
        return redirect('contact');
    }

    public function dmcday(Request $request)
    {


        $this->validate($request,[
            'name' => 'required',
        ]);

//        $slug = str_slug($request->title);
        $needhelp = Dmcday::create();
        $needhelp->name = $request->name;
        $needhelp->mobile = $request->mobile;
        $needhelp->email = $request->email;
        $needhelp->gender = $request->gender;
        $needhelp->address = $request->address;
        $needhelp->size = $request->size;
        $needhelp->batch = $request->batch;
        $needhelp->acoompany = $request->acoompany;

        $needhelp->acoompanytype = $request->acoompanytype;
        $needhelp->belowperson = $request->belowperson;
        $needhelp->aboveperson = $request->aboveperson;

        $needhelp->btprice = $request->btprice;
        $needhelp->currentdesignation = $request->currentdesignation;
        $needhelp->game = $request->game;
        $needhelp->lifemember = $request->lifemember;
        $needhelp->lifeno = $request->lifeno;

        if($request->acoompany == "Yes"){
        $needhelp->spouse = $request->spouse;
        $needhelp->free = $request->free;
        $needhelp->plus10 = $request->plus10;
        }

        $insertedId = $needhelp->id;

        $randomNumber = random_int(100, 999);
        $dmcCode = $insertedId . $randomNumber;
        $needhelp->random = $dmcCode;

        $needhelp->save();
        return redirect()->route('dmc.invoice',$dmcCode)->with('successMsg','Your Request Has Benn Successfully Submitted!');
    }



    // public function dmcpay(Request $request)
    // {

    //     $data = request()->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'random' => 'required'
    //     ]);
    //     $random = $request->random;
    //     $needhelp = Dmcday::where('random', $random)->first();
    //     $needhelp->display = 1;
    //     $needhelp->save();
    //     Mail::to($request->email)->send(new DmcMail($data));
    //     return redirect()->route('dmc.successmessage')->with('successMsg','Your Request Has Benn Successfully Submitted!');
    // }
    
    
     public function dmcpay(Request $request)
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $contactus   =   ContactUs::orderBy('id','DESC')

            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','ASC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects  =   Objects::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'random' => 'required'
        ]);
        $random = $request->random;
        $needhelp = Dmcday::where('random', $random)->first();
        $needhelp->display = 1;
        $needhelp->save();
        Mail::to($request->email)->send(new DmcMail($data));
//        return redirect()->route('dmc.successmessage')->with('successMsg','Your Request Has Benn Successfully Submitted!');

        return view('frontend/home.successmessage',compact('random','objects','objects2','initative','main','contactus','footer','career','allprnews','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));


    }
    

    public function shurjopaysubmission(Request $request)
    {


        $shurjopay_service = new ShurjopayController();
//        $tx_id = $shurjopay_service->generateTxId();
        $type = 'nonsubfee';
        $info = array( 'currency' => "BDT", 'amount' => $request->amount, 'order_id' => "$request->random", 'discsount_amount' =>'' , 'disc_percent' =>'' , 'client_ip' => "", 'customer_name' => $request->name, 'customer_phone' => $request->mobile, 'email' => $request->email, 'customer_address' => "$request->batch", 'customer_city' => "Dhaka", 'customer_state' => "Dhaka", 'customer_postcode' => "1212", 'customer_country' => "Bangladesh", 'value1' => "nonrenew",'value2'=>"$request->mobile",'value3'=>"$request->mobile",'value4'=>"$request->mobile");
        $shurjopay_service = new ShurjopayController();
        return $shurjopay_service->checkout($info);
    }


    public function helpform(Request $request)
    {

        $this->validate($request,[
            'fname' => 'required',

        ]);

//        $slug = str_slug($request->title);
        $needhelp = new NeedHelp();
        $needhelp->name = $request->name;
        $needhelp->lname = $request->lname;
        $needhelp->email = $request->email;
        $needhelp->phone = $request->phone;
        $needhelp->address = $request->address;
        $needhelp->message = $request->message;

        $needhelp->save();
        return redirect()->route('need.help')->with('successMsg','Your Request Has Benn Successfully Submitted!');

    }

    public function payment_response()
    {
        $shurjopay_service = new ShurjopayController();
        $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $query_str = parse_url($actual_link, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        $orderid = $query_params['order_id'];
        $response=$shurjopay_service->verify($orderid);
//       dd($response);

       $decryptValues=json_decode($response);
        $status = $decryptValues[0]->sp_code;

        $value1 = $decryptValues[0]->value1;



        $payable_amount = $decryptValues[0]->payable_amount;
        $recived_amount = $decryptValues[0]->recived_amount;



        if($value1 =='nonrenew') {

            $userid = $decryptValues[0]->customer_order_id;
            $subscriptionid = $decryptValues[0]->value3;
            $name = $decryptValues[0]->name;
            $email = $decryptValues[0]->value4;
            $year = $decryptValues[0]->value2;
            $subscriber_number = $decryptValues[0]->address;
            $amount = $decryptValues[0]->amount;
            $invoice_no = $decryptValues[0]->invoice_no;

            if($status =='1000') {
                if ($payable_amount == $recived_amount) {
                    return redirect(route('dmc.success',['random'=>$userid]));
                    die();
                }
                else {
                    return redirect(route('dmc.success',['random'=>$userid]));
                    //return redirect(route('dmc.failed'));
                    die();
                }
            }
            else {

                return redirect(route('dmc.failed'));
                die();
            }
        }

    }

    public function memberformstore(Request $request)
    {

        $this->validate($request,[
            'Name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->Name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/team'))
            {
                mkdir('uploads/team', 0777 , true);
            }
            $image->move('uploads/team',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

//        $slug = str_slug($request->title);
        $needhelp = new Team();
        $needhelp->Name = $request->Name;
        $needhelp->FatherMotherHusband = $request->FatherMotherHusband;
        $needhelp->Age = $request->Age;
        $needhelp->Occupation = $request->Occupation;
        $needhelp->EducationQuali = $request->EducationQuali;
        $needhelp->districtId = $request->districtId;
        $needhelp->VillageHome = $request->VillageHome;
        $needhelp->UnionMunicipality = $request->UnionMunicipality;
        $needhelp->ThanaUpazila = $request->ThanaUpazila;
        $needhelp->NID = $request->NID;
        $needhelp->MobileNo = $request->MobileNo;
        $needhelp->Email = $request->Email;
        $needhelp->Yes = $request->Yes;
        $needhelp->past = $request->past;
        $needhelp->slug = $slug;

        $needhelp->image = $imagename;

        $needhelp->save();
        return redirect()->route('member.form')->with('successMsg','Your Request Has Benn Successfully Submitted!');

    }

    public function category()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $category   =   Category::orderBy('id','DESC')
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/category.all',compact('objects2','initative','main','footer','career','category','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }

    public function products()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $category   =   Category::orderBy('id','DESC')
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        $video   =   video::orderBy('id','ASC')
            ->get();

        return view('frontend/video.products',compact('video','objects2','initative','main','footer','career','category','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }


    public function video()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $category   =   Category::orderBy('id','DESC')
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        $video   =   video::orderBy('id','ASC')
                ->get();

        return view('frontend/video.all',compact('video','objects2','initative','main','footer','career','category','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }


    public function item($id)
    {
        $category = Category::where('id',$id)->first();

        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $item   =   Item::orderBy('id','DESC')
            ->where('category_id',$id)
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/item.all',compact('objects2','category','initative','main','footer','career','item','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }

    public function products_details($id)
    {
        $category = Category::where('id',$id)->first();

        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $item = Item::orderBy('id', 'DESC')
            ->where('id', $id)
            ->first();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/item.products_details',compact('objects2','category','initative','main','footer','career','item','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }

    public function product_item($id)
    {
        $category = video::where('id',$id)->first();

        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $initative   =   Activity::orderBy('id','ASC')
            ->limit(3)
            ->get();
        $item   =   Item::orderBy('id','DESC')
            ->where('category_id',$id)
            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $factory  =   Others::orderBy('id','ASC')
            ->where('id',5)
            ->get();

        $branch1  =   Others::orderBy('id','ASC')
            ->where('id',6)
            ->get();
        $branch2  =   Others::orderBy('id','ASC')
            ->where('id',7)
            ->get();
        $branch3  =   Others::orderBy('id','ASC')
            ->where('id',8)
            ->get();
        $branch4  =   Others::orderBy('id','ASC')
            ->where('id',9)
            ->get();
        $it  =   Others::orderBy('id','ASC')
            ->where('id',10)
            ->get();
        $objects2  =   Objects::orderBy('id','ASC')
            ->where('id',2)
            ->get();

        return view('frontend/item.product_item',compact('objects2','category','initative','main','footer','career','item','links','contact1','contact2','headoffice','factory','branch1','branch2','branch3','branch4','it'));
    }

    public function gallery()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $photo   =   photo_gallery_table::orderBy('id','ASC')

            ->get();

        $video   =   video::orderBy('id','ASC')

            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/gallery.all',compact('photo','video','main','footer','career','allprnews','links','contact1','contact2','headoffice'));
    }
    public function mission_vission()
    {
        $career   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $company   =   CompanyManagement::orderBy('id','ASC')

            ->get();

        $video   =   video::orderBy('id','ASC')

            ->get();
        $allprnews   =   Activity::orderBy('id','DESC')

            ->get();

        $main   =   Menu::orderBy('sequence','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();

        $contact1  =   Others::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $contact2  =   Others::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $headoffice  =   Others::orderBy('id','ASC')
            ->where('id',4)
            ->get();
        $mission  =   Mission::orderBy('id','ASC')
            ->where('id',1)
            ->get();
        $chairman  =   Mission::orderBy('id','ASC')
            ->where('id',2)
            ->get();
        $director  =   Mission::orderBy('id','ASC')
            ->where('id',3)
            ->get();
        $agm  =   Mission::orderBy('id','ASC')
            ->where('id',4)
            ->get();

        return view('frontend/company.all',compact('agm','director','chairman','mission','company','video','main','footer','career','allprnews','links','contact1','contact2','headoffice'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function search(Request $request)
    {
        $sector  =   Sector::all();
        $industry  =   Industry::all();
        $ratingtype  =   Ratingtype::all();
        $ratinglist  =   Ratinglist::all();
        $outlook  =   Outlook::all();
        $articles   =   Service::orderBy('id','DESC')
            ->limit(3)
            ->get();
        $prnews   =   Activity::orderBy('id','DESC')
            ->limit(3)
            ->get();


        $main   =   Menu::orderBy('id','DESC')
            ->where('display',1)
            ->get();
        $links  =   Link::all();
        $footer   =   Menu::orderBy('sequence','ASC')
            ->where('footer1',1)
            ->get();


        $search =   $request->get('query');
        $ratings    =   Rating::where('title','like','%' .$search. '%')->paginate(5);
        return view('frontend/rating.search',compact('ratings','articles','prnews','main','links','footer','sector','industry','ratingtype','ratinglist','outlook'));
    }



    public function rating_search(Request $request)
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
        $sectorsearch =   $request->get('sector');
        $industrysearch =   $request->get('industry');
        $ratingtypesearch =   $request->get('ratingtype');
        $ratinglistsearch =   $request->get('ratinglist');
        $outlooksearch =   $request->get('outlook');
        $ratings    =   Rating::where('sector',$sectorsearch)
            ->where('industry',$industrysearch)
            ->where('type',$ratingtypesearch)
            ->where('type',$ratingtypesearch)
            ->where('rating',$ratinglistsearch)
            ->where('outlook',$outlooksearch)
            ->paginate(50);


        return view('frontend/rating.search_result',compact('ratings','news','main','links','footer','prnews','articles','rating','sector','industry','ratingtype','ratinglist','outlook'));
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
        //
    }
}
