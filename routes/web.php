<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false]);
Route::post('store/restaurant', [RestaurantController::class, 'store'])->name('store.restaurant');
Route::put('update/restaurant/{restaurant}', [RestaurantController::class, 'update'])->name('update.restaurant');
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('home');
Route::delete('/destroy/restaurant/{restaurant}', [RestaurantController::class, 'destroy'])->name('destroy.restaurant');
