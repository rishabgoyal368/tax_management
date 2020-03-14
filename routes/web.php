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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Auth::routes(['register' => false]);


Route::get('/Job-listing-websites', 'JobListingWebsiteController@show')->name('Job-listing-websites');
Route::any('Add-job-listing-websites','JobListingWebsiteController@add');
Route::any('Edit-job-listing-websites/{id}','JobListingWebsiteController@edit');



Route::get('/designations', 'DesignationsController@show');


Route::get('/department', 'DepartmentController@show')->name('department');
Route::any('Add-department', 'DepartmentController@add');

