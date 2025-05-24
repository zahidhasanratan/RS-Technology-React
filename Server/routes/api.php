<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/menus', [\App\Http\Controllers\Api\MenuController::class, 'index']);
Route::post('/contact', [\App\Http\Controllers\frontend\HomeController::class, 'contactmail']);


Route::get('/footermenu', [\App\Http\Controllers\Api\MenuController::class, 'menus1']);
Route::get('/projects', [\App\Http\Controllers\Api\ActivityController::class, 'index']);
Route::get('/faq', [\App\Http\Controllers\Api\FaqController::class, 'index']);

Route::get('/faq/{slug}', [\App\Http\Controllers\Api\FaqController::class, 'details']);
Route::get('/packagepricing', [\App\Http\Controllers\Api\packagepricing::class, 'index']);
Route::get('/packagepricing/{slug}', [\App\Http\Controllers\Api\PackagePricingController::class, 'details']);

Route::get('/technology', [\App\Http\Controllers\Api\TechnologyController::class, 'index']);
Route::get('/technology/{slug}', [\App\Http\Controllers\Api\TechnologyController::class, 'details']);
Route::get('/webprocess', [\App\Http\Controllers\Api\WebProcessController::class, 'index']);
Route::get('/webprocess/{slug}', [\App\Http\Controllers\Api\WebProcessController::class, 'details']);
Route::get('/clientbenifits', [\App\Http\Controllers\Api\ClientBenifitsController::class, 'index']);
Route::get('/clientbenifits/{slug}', [\App\Http\Controllers\Api\ClientBenifitsController::class, 'details']);
Route::get('/clients', [\App\Http\Controllers\Api\PhotoController::class, 'index']);
Route::get('/news', [\App\Http\Controllers\Api\NewsController::class, 'index']);
Route::get('/news/{slug}', [\App\Http\Controllers\Api\NewsController::class, 'details']);
Route::get('/page/{slug}', [\App\Http\Controllers\Api\PageController::class, 'details']);

Route::get('/slider', [\App\Http\Controllers\Api\SliderController::class, 'index']);
Route::get('/career', [\App\Http\Controllers\Api\CareerController::class, 'index']);
Route::get('/photo', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('/photo/{slug}', [\App\Http\Controllers\Api\CategoryController::class, 'details']);
Route::get('/video', [\App\Http\Controllers\Api\VideoController::class, 'index']);
Route::get('/Management', [\App\Http\Controllers\Api\ManagementController::class, 'index']);
Route::get('/solution', [\App\Http\Controllers\Api\ServiceController::class, 'index']);
Route::get('/solution/{slug}', [\App\Http\Controllers\Api\ServiceController::class, 'details']);
Route::get('/featured', [\App\Http\Controllers\Api\FeatureController::class, 'index']);
Route::get('/featured/{slug}', [\App\Http\Controllers\Api\FeatureController::class, 'details']);
Route::get('/featuredSlug/{slug}', [\App\Http\Controllers\Api\FeatureController::class, 'detailsSlug']);

Route::get('/qualityservice', [\App\Http\Controllers\Api\QualityServiceController::class, 'index']);
Route::get('/qualityservice/{slug}', [\App\Http\Controllers\Api\QualityServiceController::class, 'details']);
Route::get('/qualityserviceSlug/{slug}', [\App\Http\Controllers\Api\QualityServiceController::class, 'detailsSlug']);

Route::get('/object1', [\App\Http\Controllers\Api\ObjectsController::class, 'object1']);
Route::get('/object2', [\App\Http\Controllers\Api\ObjectsController::class, 'object2']);
Route::get('/about/{slug}', [\App\Http\Controllers\Api\ObjectsController::class, 'details']);
Route::get('/objects3', [\App\Http\Controllers\Api\ObjectsController::class, 'object3']);
Route::get('/objects5', [\App\Http\Controllers\Api\ObjectsController::class, 'objects5']);
Route::get('/objects6', [\App\Http\Controllers\Api\ObjectsController::class, 'objects6']);
Route::get('/footercontact', [\App\Http\Controllers\Api\OthersController::class, 'others2']);
Route::get('/footerother', [\App\Http\Controllers\Api\OthersController::class, 'others6']);
Route::get('/social', [\App\Http\Controllers\Api\OthersController::class, 'others7']);
