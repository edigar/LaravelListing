<?php

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
    return view('welcome');
});

//Routes for modules:
Route::resource('modules', 'ModuleController');
Route::get('/create/module','ModuleController@create');
Route::post('/create/module','ModuleController@store');
Route::get('edit/module/{id}','ModuleController@edit');
Route::patch('edit/module/{id}','ModuleController@update');
Route::delete('/delete/module/{id}','ModuleController@destroy');

//Routes for activities:
Route::resource('/activities/{module_id}/', 'ActivityController');
Route::get('/create/activity/{module_id}','ActivityController@create');
Route::post('/create/activity','ActivityController@store');
Route::get('edit/activity/{id}','ActivityController@edit');
Route::patch('edit/activity/{id}','ActivityController@update');
Route::delete('/delete/activity/{id}','ActivityController@destroy');