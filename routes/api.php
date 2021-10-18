<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WebsiteSubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('website', WebsiteController::class);

Route::apiResource('posts', PostController::class);

Route::apiResource('subscriber', SubscriberController::class);

Route::post('subscribe/{website}', WebsiteSubscriptionController::class)
        ->name('subscribe.to.website');
