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

//Welcom Route
Auth::routes();
Route::get('/', 'PagesController@welcome');

//Home Routes
Auth::routes();
Route::get('/home', 'PagesController@home')->name('home')->middleware('authenticated');

//Manpower Routes
Auth::routes();
Route::get('/addmanpower', 'ManpowerController@addmanpower')->middleware('authenticated');
Auth::routes();
Route::get('/personalinfo/{id}', 'ManpowerController@personalinfo')->middleware('authenticated');
Auth::routes();
Route::get('/educationinfo/{id}', 'ManpowerController@educationinfo')->middleware('authenticated');
Auth::routes();	
Route::get('/governinfo/{id}', 'ManpowerController@governinfo')->middleware('authenticated');

//	