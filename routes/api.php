<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('users')->namespace('Users')->group(function (){

    Route::prefix('auth')->group(function (){

        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');

        Route::prefix('email')->middleware(['auth:users,users-web'])->group(function (){
            Route::post('/verify', 'AuthController@verifyEmail');
            Route::get('/resend_verification_code', 'AuthController@resendVerificationCode');
        });
    });

});