<?php

use App\Http\Controllers\AuthController;
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

Route::group(['prefix' => 'v1','middleware' => ['auth:api','json.response']], function($app) {
    Route::get('userinfo',  [AuthController::class, 'userInfo']);
});

Route::group(['prefix' => 'v1', 'middleware' => ['json.response']], function($app) {
    Route::post('user',  [AuthController::class, 'register']);
    Route::post('auth',  [AuthController::class, 'login']);
    // Route::get('userinfo',  [AuthController::class, 'userInfo']);
});

