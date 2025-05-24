<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\DmcDayController;
use App\Http\Controllers\admin\MoneyReceiptController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ActivityController;
use App\Http\Controllers\admin\PublicationController;
use App\Http\Controllers\admin\MedicalFeatureController;
use App\Http\Controllers\admin\MicroFinanceController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ObjectsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\RatingController;
use App\Http\Controllers\frontend\RegistrationController;
use App\Http\Controllers\frontend\AdminController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\MedicalSliderController;
use App\Http\Controllers\admin\MicroSliderController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\LifeMemberController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\PreviousProgramController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\PhotoGalleryController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\CompanyManagementController;
use App\Http\Controllers\admin\LinkController;
use App\Http\Controllers\admin\OthersController;
use App\Http\Controllers\admin\NeedHelpController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\admin\RatingTypeController;
use App\Http\Controllers\admin\RatingListController;
use App\Http\Controllers\admin\OutlookController;
use App\Http\Controllers\admin\AdminUser;
use App\Http\Controllers\admin\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/day', [HomeController::class, 'day'])->name('day');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/Life-Member', [HomeController::class, 'lifemember'])->name('life.member');
Route::get('/facilities', [HomeController::class, 'facility'])->name('facility');
Route::get('Ho/Yesg/{slug}', [MoneyReceiptController::class, 'details'])->name('money.details');
Route::get('money/pdf/{slug}', [MoneyReceiptController::class, 'pdf'])->name('money.pdf');
Route::post('dmc/day', [HomeController::class, 'dmcday'])->name('dmc.day');
Route::get('dmc/invoice/{slug}', [HomeController::class, 'invoice'])->name('dmc.invoice');
Route::post('dmc/pay/success', [HomeController::class, 'dmcpay'])->name('dmc.pay.success');
Route::get('dmc/ticket/{slug}', [HomeController::class, 'ticket'])->name('dmc.ticket');
Route::get('dmc/successmessage', [HomeController::class, 'successmessage'])->name('dmc.successmessage');
Route::get('dmc/failed', [HomeController::class, 'failed'])->name('dmc.failed');
Route::post('dmc/fee-shurjopay-submission', [HomeController::class, 'shurjopaysubmission'])->name('dmc.shurjopay.submission');
Route::get('/payment-response', [HomeController::class, 'payment_response'])->name('payment-response');
Route::get('dmc/success/{slug}', [HomeController::class, 'success'])->name('dmc.success');
Route::get('dmc/success/admin/{slug}', [HomeController::class, 'success2'])->name('dmc.success.admin');
Route::get('Non/subscriber-fee-payement-submission/{id}/{subscriptionid}/{name}/{email}/{amount}/{year}/{subscriber_number}/{tx_id}', [SubscriberDashboardController::class, 'nonsubfee_payment_submit'])->name('nonsubfees-payment-submission');
Route::get('news/details/{slug}', [NewsController::class, 'details'])->name('news.details');
Route::get('CommitteeMeetting/details/{slug}', [ActivityController::class, 'details'])->name('com.details');
Route::get('committee/details/{slug}', [HomeController::class, 'committeedetails'])->name('committee.details');
Route::get('publication-details/{slug}', [PublicationController::class, 'details'])->name('publication.details');
Route::get('medical-feature-details/{slug}', [MedicalFeatureController::class, 'details'])->name('medicalfeature.details');
Route::get('micro-finance-details/{slug}', [MicroFinanceController::class, 'details'])->name('microfeature.details');
Route::get('service-details/{slug}', [ServiceController::class, 'details'])->name('service.details');
Route::get('Mission-details/{slug}', [ObjectsController::class, 'details'])->name('object.details');
Route::get('article-research/{slug}', [ServiceController::class, 'details'])->name('article.details.details');
Route::get('news', [HomeController::class, 'all_news'])->name('news.all');
Route::get('events', [HomeController::class, 'all_notice'])->name('notice.all');
Route::get('district-committee', [HomeController::class, 'districtcommittee'])->name('district.committee');
Route::get('Dhaka', [HomeController::class, 'micro'])->name('museum.dhaka');
Route::get('Rangpur', [HomeController::class, 'rangpur'])->name('museum.rangpur');
Route::post('member-search', [HomeController::class, 'reportsearch'])->name('report.search');
Route::get('need-help', [HomeController::class, 'need_help'])->name('need.help');
Route::get('committee-list', [HomeController::class, 'memberlist'])->name('member-list');
Route::get('past-leader', [HomeController::class, 'famous'])->name('past-leader');
Route::get('Member-Details/{slug}', [HomeController::class, 'memberdetails'])->name('member.details');
Route::get('member-form', [HomeController::class, 'memberform'])->name('member.form');
Route::get('Medical-Waste-Management', [HomeController::class, 'medical'])->name('medical.waste.all');
Route::get('Micro-Finance', [HomeController::class, 'micro'])->name('micro.finance.all');
Route::get('team', [HomeController::class, 'team'])->name('team.all');
Route::get('previous-program', [HomeController::class, 'previous'])->name('previous.all');
Route::get('Executive-Committee', [HomeController::class, 'executive'])->name('executive.committee.all');
Route::get('initative', [HomeController::class, 'initative'])->name('pr.news.all');
Route::get('career', [HomeController::class, 'career']);
Route::get('gallery', [HomeController::class, 'category']);
Route::get('video', [HomeController::class, 'video']);
Route::get('contact', [HomeController::class, 'contact']);
Route::post('contactus', [HomeController::class, 'contactmail'])->name('contact.us');
Route::post('helpform', [HomeController::class, 'helpform'])->name('help.form');
Route::post('membership', [HomeController::class, 'memberformstore'])->name('member.submit');
Route::get('product_category', [HomeController::class, 'category']);
Route::get('products_item/{id}', [HomeController::class, 'item']);
Route::get('products_gallery/{id}', [HomeController::class, 'product_item']);
Route::get('products_details/{id}', [HomeController::class, 'products_details']);
Route::get('mission_vission', [HomeController::class, 'mission_vission']);
Route::get('article-research', [HomeController::class, 'all_article'])->name('article.news.all');
Route::get('page/{slug}', [PageController::class, 'details'])->name('page.details');
Route::get('Texpeon/{slug}', [ObjectsController::class, 'details'])->name('about.details');
Route::get('rating-details/{slug}', [RatingController::class, 'details'])->name('rating.details');
Route::get('/search', [HomeController::class, 'search'])->name('company.search');
Route::get('/rating-search', [HomeController::class, 'rating_search'])->name('rating.search');

// Authentication Routes
Route::get('register', [RegistrationController::class, 'index'])->name('register');
Route::post('register', [RegistrationController::class, 'registration'])->name('register');
Route::get('register/pending', [RegistrationController::class, 'pending'])->name('ragistration.index');

// Admin Routes
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('rating-information', [AdminController::class, 'index']);
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('districtall/{slug}', [ServiceController::class, 'index'])->name('district.all');
    Route::get('adddistrict/{slug}', [ServiceController::class, 'create'])->name('district.add');
    Route::get('service/view/{slug}', [ServiceController::class, 'view'])->name('service.view');
    Route::get('committee/add/{slug}', [PreviousProgramController::class, 'create'])->name('committee.add');
    Route::get('branch/{slug}', [MoneyReceiptController::class, 'alluser'])->name('money.all');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('passwordchange', [ChangePasswordController::class, 'index'])->name('password.change');
    Route::post('passwordchange', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    Route::resource('slider', SliderController::class);
    Route::resource('money_receipt', MoneyReceiptController::class);
    Route::resource('medicalslider', MedicalSliderController::class);
    Route::resource('microslider', MicroSliderController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('contactus', ContactUsController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('page', PageController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('life', LifeMemberController::class);
    Route::resource('news', NewsController::class);
    Route::resource('dmcday', DmcDayController::class);
    Route::resource('medicalfeature', MedicalFeatureController::class);
    Route::resource('microfinancefeature', MicroFinanceController::class);
    Route::resource('team', TeamController::class);

    Route::get('faq/create/{id}', [\App\Http\Controllers\admin\FaqController::class, 'create'])->name('faq.create');
    Route::resource('faq', \App\Http\Controllers\admin\FaqController::class)->except('create');

    Route::get('packagepricing/create/{id}', [\App\Http\Controllers\admin\PackagePriceController::class, 'create'])->name('packagepricing.create');
    Route::resource('packagepricing', \App\Http\Controllers\admin\PackagePriceController::class)->except('create');

    Route::get('technology/create/{id}', [\App\Http\Controllers\admin\TechnologyController::class, 'create'])->name('technology.create');
    Route::resource('technology', \App\Http\Controllers\admin\TechnologyController::class)->except('create');

    Route::get('webprocess/create/{id}', [\App\Http\Controllers\admin\WebProcessController::class, 'create'])->name('webprocess.create');
    Route::resource('webprocess', \App\Http\Controllers\admin\WebProcessController::class)->except('create');

    Route::get('clilentbenifts/create/{id}', [\App\Http\Controllers\admin\ClientBenifitsController::class, 'create'])->name('clilentbenifts.create');
    Route::resource('clilentbenifts', \App\Http\Controllers\admin\ClientBenifitsController::class)->except('create');

    Route::get('featured/create/{id}', [\App\Http\Controllers\admin\FeaturedController::class, 'create'])->name('featured.create');
    Route::resource('featured', \App\Http\Controllers\admin\FeaturedController::class)->except(['create']);

    Route::get('qualityservice/create/{id}', [\App\Http\Controllers\admin\QualityServiceController::class, 'create'])->name('qualityservice.create');
    Route::resource('qualityservice', \App\Http\Controllers\admin\QualityServiceController::class)->except(['create']);




    Route::resource('previous', PreviousProgramController::class);
    Route::resource('publication', PublicationController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('item', ItemController::class);
    Route::resource('photo', PhotoGalleryController::class);
    Route::resource('video', VideoController::class);
    Route::resource('company', CompanyManagementController::class);
    Route::resource('link', LinkController::class);
    Route::resource('others', OthersController::class);
    Route::resource('NeedHelp', NeedHelpController::class);
    Route::resource('mission', MissionController::class);
    Route::resource('objects', ObjectsController::class);
    Route::resource('rating', RatingController::class);
    Route::resource('sector', SectorMyController::class);
    Route::resource('industry', IndustryController::class);
    Route::resource('ratingtype', RatingTypeController::class);
    Route::resource('ratinglist', RatingListController::class);
    Route::resource('outlook', OutlookController::class);
    Route::resource('adminuser', AdminUser::class);
    Route::resource('user', UserController::class);
    Route::resource('post', \App\Http\Controllers\admin\PostController::class);
    Route::resource('applicant',\App\Http\Controllers\admin\ApplicantController::class);
    Route::get('/approve', [AdminUser::class, 'pending'])->name('adminuser.approve');
    Route::get('edituser/{slug}', [AdminUser::class, 'edituser'])->name('adminuser.edituser');
    Route::put('deactive/{id}', [AdminUser::class, 'updatedeactive'])->name('adminuser.updatedeactive');
    Route::get('/ajaxsearch', [MenuController::class, 'searchajax'])->name('menu.ajaxsearch');
});
