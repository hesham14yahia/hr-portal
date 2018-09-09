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

Auth::routes();

// Home main page
Route::get('/', 'HomeController@index')->name('home');

// Create employee and store
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/store', 'HomeController@store')->name('store');

// Edit employee and update
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
Route::put('/update/{id}', 'HomeController@update')->name('update');

// Delete employee
Route::get('/destroy/{id}', 'HomeController@destroy')->name('destroy');

// Create Attendance and store
Route::get('/createAtt', 'HomeController@createAtt')->name('createAtt');
Route::post('/storeAtt', 'HomeController@storeAtt')->name('storeAtt');

// Report page
Route::get('/report', 'HomeController@report')->name('report');

// Employee of the month
Route::get('/empMonth', 'HomeController@empMonth')->name('empMonth');
