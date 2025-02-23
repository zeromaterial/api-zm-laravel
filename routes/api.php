<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TestimonyController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\DonationTypeController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\PlantController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('/users', UserController::class);
Route::get('/usershowcampaigns/{user}', [UserController::class, 'userShowCampaign']);
Route::get('/usershowdonations/{user}', [UserController::class, 'userShowDonation']);

Route::apiResource('/plants', PlantController::class);
Route::apiResource('/payment_methods', PaymentMethodController::class);
Route::apiResource('/donation_types', DonationTypeController::class);

Route::apiResource('/testimonies', TestimonyController::class);
Route::apiResource('/campaigns', CampaignController::class);
Route::apiResource('/donations', DonationController::class);
