<?php

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
    return view('index');
});

Route::get('/loginpage', function () {
    return view('login');
});

Route::get('/Job-listing-websites','JobListingWebsiteController@show');
Route::any('Add-job-listing-websites','JobListingWebsiteController@add');
Route::post('login', [ 'as' => 'login', 'uses' => 'AdminController@index']);
Route::any('login', 'AdminController@login');
Route::get('/logout','AdminController@logout');



