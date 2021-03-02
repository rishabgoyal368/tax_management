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



Route::post('app-setting', 'Api\JwtAuthController@setting');
Route::post('login', 'Api\JwtAuthController@login');
Route::post('register', 'Api\JwtAuthController@register');

Route::get('tax-list', 'Api\TaxController@taxList');

Route::group(['middleware' => 'token_auth','namespace' => 'Api'], function () {

    // User Controller
    Route::post('logout', 'JwtAuthController@logout');
    Route::get('user-info', 'JwtAuthController@getUser');
    Route::post('update-profile', 'JwtAuthController@updateProfile');

   
});
