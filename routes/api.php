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

Route::post('/forgot-password','Api\JwtAuthController@forgot_password');
Route::post('/reset-password','Api\JwtAuthController@reset_password');



Route::post('/app-setting', 'Api\JwtAuthController@setting');
Route::post('/login', 'Api\JwtAuthController@login');
Route::post('/register', 'Api\JwtAuthController@register');


Route::group(['middleware' => 'token_auth','namespace' => 'Api'], function () {

    // User Controller
    Route::post('/logout', 'JwtAuthController@logout');
    Route::get('/user-info', 'JwtAuthController@getUser');
    Route::post('/update-profile', 'JwtAuthController@updateProfile');

    // Additional tax
    Route::get('/tax-list', 'TaxController@taxList');
     //content
    Route::post('/get-content','TaxController@getContent');

    //Supplier-Data
    Route::post('/supplier-data/add','TaxController@supplier_data_add');

   //Buy-invoice
    Route::post('/buy-invoice/add','TaxController@buy_invoice_add');

    //salary-taxes
    Route::post('/salary-taxes/add','NewController@salary_tax_add');
   
    //company-estalishment
    Route::post('/company-estalishment/add','NewController@company_establishment_add');

    //add-deduct-taxes
    Route::post('/add-deduct-taxes/add','NewController@add_deduct_taxes_add');

    //salary2-taxes
    Route::post('/salary2-taxes/add','NewController@salary2_taxes_add');

    //salary2-taxes
    Route::post('/financial-lists/add','NewController@financial_list_add');

   //------------------Invoice--------------------------
    Route::post('/invoice/add','InvoiceController@add_invoice');

   //------------------Invoice--------------------------

   
});
