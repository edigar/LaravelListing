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

//Route::get('/create/ticket','TicketController@create');
Route::resource('modules', 'ModuleController');
Route::get('/create/module','ModuleController@create');
Route::post('/create/module','ModuleController@store');
Route::get('edit/module/{id}','ModuleController@edit');
Route::patch('edit/module/{id}','ModuleController@update');
Route::delete('/delete/module/{id}','ModuleController@destroy');