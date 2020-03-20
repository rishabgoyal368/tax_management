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
Route::post('/import','HomeController@import');
Auth::routes(['register' => false]);

//==========> Job listing Website <===================//
Route::any('/Job-listing-websites', 'JobListingWebsiteController@show')->name('Job-listing-websites');
Route::any('Add-job-listing-websites', 'JobListingWebsiteController@add');
Route::any('Edit-job-listing-websites/{id}', 'JobListingWebsiteController@edit');
Route::any('Show-job-listing-websites/{id}', 'JobListingWebsiteController@display');
Route::any('Delete-job-listing-websites', 'JobListingWebsiteController@delete');
ROute::post('export-joblisting','JobListingWebsiteController@export');
Route::post('reauthenticate','HomeController@reauthenticate');



//==========> Department <===================//
Route::post('/get-department-ajax', 'DepartmentController@getDepartment');
//==========> Designation <=================// 
Route::any('/designation', 'DesignationController@show')->name('designation');
Route::post('/get-department-title', 'DesignationController@Designation');
Route::any('add-designation', 'DesignationController@add');
Route::any('edit-designation/{id}', 'DesignationController@add');
Route::get('view-designation/{id}', 'DesignationController@view');
Route::delete('delete-designation', 'DesignationController@delete');
ROute::post('export-designation','DesignationController@export');
//==========> Users Management <=================// 
// Route::any('/user-management', 'DesignationsController@show');

Route::any('/job-opening', 'JobOpeningController@show')->name('jobOpening');
Route::any('add-job-opening', 'JobOpeningController@add');


