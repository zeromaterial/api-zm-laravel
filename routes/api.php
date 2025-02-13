<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\TestimonyController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CampaignController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('/companies', CompanyController::class);
Route::apiResource('/teams', TeamController::class);
Route::apiResource('/users', UserController::class);
Route::apiResource('/galleries', GalleryController::class);
Route::apiResource('/testimonies', TestimonyController::class);
Route::apiResource('/comments', CommentController::class);
Route::apiResource('/articles', ArticleController::class);
Route::apiResource('/campaigns', CampaignController::class);
