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
Route::post('reauthenticate','HomeController@reauthenticate');
Auth::routes(['register' => false]);

//==========> Admin  <===================//
Route::any('/updateprofile','AdminController@update');

//==========> Department <===================//
Route::post('/get-department-ajax', 'DepartmentController@getDepartment');
//==========> Designation <=================// 
Route::any('/manage-user', 'UserController@show')->name('manage-user');
Route::any('add-user', 'UserController@add');
Route::any('edit-user/{id}', 'UserController@add');
Route::delete('delete-designation', 'UserController@delete');
ROute::post('export-designation','UserController@export');
//==========> Users Management <=================// 
// Route::any('/user-management', 'DesignationsController@show');

Route::any('/job-opening', 'JobOpeningController@show')->name('jobOpening');
Route::post('/get-job-opening-title','JobOpeningController@jobTitle');
Route::get('/edit-job-opening/{id}','JobOpeningController@add');
Route::any('add-job-opening', 'JobOpeningController@add');


//==========> Admin  <===================//
Route::any('/updateprofile','AdminController@update');
Route::any('/updatepassword','AdminController@updatepassword');


