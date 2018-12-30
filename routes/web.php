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

//PagesController
Auth::routes();
Route::any('/search', 'PagesController@search')->middleware('authenticated');
Auth::routes();
Route::any('delete/{id}', 'PagesController@destroy')->middleware('authenticated');

//Manpower Routes
Auth::routes();
Route::get('/addmanpower', 'ManpowerController@addmanpower')->middleware('authenticated');
Auth::routes();
Route::post('/newrecord', 'ManpowerController@addnewmanpowerrecord')->middleware('authenticated');
Auth::routes();
Route::post('/doimport', 'ManpowerController@doimport')->middleware('authenticated');
Auth::routes();
Route::get('/uploadmanpower', 'ManpowerController@uploadmanpower')->middleware('authenticated');
Auth::routes();
Route::get('/personalinfo/{id}', 'ManpowerController@personalinfo')->middleware('authenticated');
Auth::routes();
Route::get('/educationinfo/{id}', 'ManpowerController@educationinfo')->middleware('authenticated');
Auth::routes();	
Route::get('/governinfo/{id}', 'ManpowerController@governinfo')->middleware('authenticated');
Auth::routes();	
Route::get('/companyinfo/{id}', 'ManpowerController@companyinfo')->middleware('authenticated');
Auth::routes();	
Route::get('/projectinfo/{id}', 'ManpowerController@projectinfo')->middleware('authenticated');
Auth::routes();	
Route::get('/others/{id}', 'ManpowerController@others')->middleware('authenticated');

/*Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');
*/

//Exporting File from database
Auth::routes();	
Route::get('/exportrecord', 'ManpowerController@exportrecord')->middleware('authenticated');
Auth::routes();	
Route::get('/export_excel', 'ManpowerController@index')->middleware('authenticated');
Auth::routes();	
Route::get('/export_excel/xls', 'ManpowerController@xls')->name('export_excel.xls')->middleware('authenticated');
Auth::routes();	
Route::get('/export_excel/xlsx', 'ManpowerController@xlsx')->name('export_excel.xlsx')->middleware('authenticated');
Auth::routes();	
Route::get('/export_excel/csv', 'ManpowerController@csv')->name('export_excel.csv')->middleware('authenticated');



//Messaging
Auth::routes();
Route::get('/createsms', 'ManpowerController@createsms')->middleware('authenticated');
Auth::routes();
Route::post('/sendsms', 'ManpowerController@sendsms')->middleware('authenticated');


