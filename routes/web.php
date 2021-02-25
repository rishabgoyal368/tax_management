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
Route::any('manage-admin','AdminController@adminList');
Route::any('add-admin','AdminController@addAdmin');
Route::any('edit-admin/{id}', 'AdminController@addAdmin');
Route::delete('delete-admin', 'AdminController@deleteAdmin');


//==========> Designation <=================// 
Route::any('/manage-user', 'UserController@show')->name('manage-user');
Route::any('add-user', 'UserController@add');
Route::any('edit-user/{id}', 'UserController@add');
Route::delete('delete-user', 'UserController@delete');

//==========> Task Management <=================// 
Route::any('/task-list', 'TaskController@show')->name('task-list');
Route::any('add-task', 'TaskController@add');
Route::any('edit-task/{id}', 'TaskController@add');
Route::delete('delete-task', 'TaskController@delete');

//==========> Admin  <===================//
Route::any('/updateprofile','AdminController@update');
Route::any('/updatepassword','AdminController@updatepassword');
Route::any('/app-setting','AdminController@appSetting');



