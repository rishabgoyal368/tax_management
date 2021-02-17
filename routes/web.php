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
Route::delete('delete-user', 'UserController@delete');
//==========> Users Management <=================// 
// Route::any('/user-management', 'DesignationsController@show');

Route::any('/manage-content', 'ContentController@show')->name('manage-content');
Route::any('add-content', 'ContentController@add');
Route::any('edit-content/{id}', 'ContentController@add');
Route::delete('delete-content', 'ContentController@delete');

Route::any('/manage-lipi', 'LipiController@show')->name('manage-lipi');
Route::any('add-lipi', 'LipiController@add');
Route::any('edit-lipi/{id}', 'LipiController@add');
Route::delete('delete-lipi', 'LipiController@delete');

Route::any('/manage-khani', 'KhaniController@show')->name('manage-khani');
Route::any('add-khani', 'KhaniController@add');
Route::any('edit-khani/{id}', 'KhaniController@add');
Route::delete('delete-khani', 'KhaniController@delete');

Route::any('/manage-spellings', 'SpellingController@show')->name('manage-spellings');
Route::any('add-spellings', 'SpellingController@add');
Route::any('edit-spellings/{id}', 'SpellingController@add');
Route::delete('delete-spellings', 'SpellingController@delete');

Route::any('/manage-Number', 'NumberController@show')->name('manage-Number');
Route::any('add-Number', 'NumberController@add');
Route::any('edit-Number/{id}', 'NumberController@add');
Route::delete('delete-Number', 'NumberController@delete');

//==========> Admin  <===================//
Route::any('/updateprofile','AdminController@update');
Route::any('/updatepassword','AdminController@updatepassword');
Route::any('/app-setting','AdminController@appSetting');



