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
Route::any('Show-job-listing-websites/{id}','JobListingWebsiteController@display');
Route::any('Delete-job-listing-websites/{id}','JobListingWebsiteController@delete');





Route::post('/get-department-ajax', 'DepartmentController@getDepartment');


Route::get('/designation', 'DesignationsController@show')->name('designation');
Route::any('add-designation', 'DesignationsController@add');
Route::any('edit-designation/{id}', 'DesignationsController@add');

