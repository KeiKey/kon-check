<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

// V1 API Routes
Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {
//    Route::apiResource('individuals', IndividualController::class, ['as' => 'api.v1'])->scoped(['individual' => 'uuid']);
});
