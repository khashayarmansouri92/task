<?php

use App\Http\Controllers\Order\SetOrderAction;
use App\Http\Controllers\User\UserLoginAction;
use App\Http\Controllers\User\UserRegisterAction;
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

Route::post('register', UserRegisterAction::class);
Route::post('login', UserLoginAction::class);
Route::group(['middleware' => 'auth:api'], function() {
    Route::post('set/order/{product}', SetOrderAction::class)->name('order.add');
});
