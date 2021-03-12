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


Route::group(['middleware' => 'token_auth','namespace' => 'Api'], function () {

    // User Controller
    Route::post('logout', 'JwtAuthController@logout');
    Route::get('user-info', 'JwtAuthController@getUser');
    Route::post('update-profile', 'JwtAuthController@updateProfile');

    // Additional tax
    Route::get('tax-list', 'TaxController@taxList');
    

    //Supplier-Data
    Route::post('/supplier-data/add','TaxController@supplier_data_add');

   //Buy-invoice
    Route::post('/buy-invoice/add','TaxController@buy_invoice_add');

    //Dummy-one
    Route::post('/first-dummy/add','NewController@first_dummy_add');
    //Dummy-second
    Route::post('/second-dummy/add','NewController@second_dummy_add');

    //Dummy-third
    Route::post('/third-dummy/add','NewController@third_dummy_add');

    //Dummy-forth
    Route::post('/forth-dummy/add','NewController@forth_dummy_add');


   
});
