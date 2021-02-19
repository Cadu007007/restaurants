<?php

use App\Http\Controllers\Api\RestaurantsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('restaurants/all', [RestaurantsController::class, 'index']);
Route::get('restaurants/filter', [RestaurantsController::class, 'filter']);
Route::get('restaurants/search', [RestaurantsController::class, 'search']);
