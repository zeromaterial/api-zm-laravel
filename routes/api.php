<?php

use App\Http\Controllers\Api\AuthController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::apiResource('/plants', PlantController::class)->only(['index', 'show']);

Route::apiResource('/testimonies', TestimonyController::class)->only(['index', 'show']);
Route::apiResource('/campaigns', CampaignController::class)->only(['index', 'show']);
Route::apiResource('/donations', DonationController::class)->only(['index', 'show']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/usershowcampaigns/{user}', [UserController::class, 'userShowCampaign']);
    Route::get('/usershowdonations/{user}', [UserController::class, 'userShowDonation']);

    Route::apiResource('/payment_methods', PaymentMethodController::class)->only(['index', 'show']);
    Route::apiResource('/donation_types', DonationTypeController::class)->only(['index', 'show']);

    Route::apiResource('/testimonies', TestimonyController::class)->only(['store']);
    Route::apiResource('/campaigns', CampaignController::class)->only(['show']);
    Route::apiResource('/donations', DonationController::class)->only(['store']);


    Route::middleware(['role:superadmin'])->group(function () {
        Route::apiResource('/users', UserController::class);

        Route::apiResource('/plants', PlantController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('/payment_methods', PaymentMethodController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('/donation_types', DonationTypeController::class)->only(['store', 'update', 'destroy']);

        Route::apiResource('/testimonies', TestimonyController::class)->only(['update', 'destroy']);
        Route::apiResource('/campaigns', CampaignController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('/donations', DonationController::class)->only(['update', 'destroy']);
    });
});
