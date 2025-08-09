<?php

use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\CompanyStateController;
use App\Http\Controllers\FooterSettingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
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
    'advantages' => AdvantageController::class,
    'company-state' => CompanyStateController::class,
    'footer' => FooterSettingController::class,
    'partners' => PartnerController::class,
    'projects' => ProjectController::class,
]);
