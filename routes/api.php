<?php

use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompanyStateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FooterSettingController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Models\CompanyStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResources([
    'company-state' => CompanyStateController::class,
    'footer' => FooterSettingController::class,
    'partners' => PartnerController::class,
    'projects' => ProjectController::class,
    'feedbacks' => FeedbackController::class,
    'services' => ServiceController::class,
    'team' => TeamController::class,
    'banner' => BannerController::class,
    'contact' => ContactController::class,
]);
// form post
Route::post('form', [FormController::class, 'store'])->name('form.store');
