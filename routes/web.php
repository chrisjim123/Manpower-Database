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



/*NO RESTRICTIONS*/


//Logout
Auth::routes();
Route::get('/logout', 'PagesController@logout')->name('logout')->middleware('authenticated');

//Welcome Route
Auth::routes();
Route::get('/', 'PagesController@welcome');

//Home Routes
Auth::routes();
Route::get('/home', 'PagesController@home')->name('home')->middleware('authenticated');

//Search
Auth::routes();
Route::any('/search', 'PagesController@search')->middleware('authenticated');

//View Manpower
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
Route::get('/Others/{id}', 'ManpowerController@others')->middleware('authenticated');

//Admin Stuff
Auth::routes();
Route::get('/admin/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
Auth::routes();
Route::get('/admin', 'AdminController@index');
Auth::routes();
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Auth::routes();
Route::get('/admin', 'AdminController@index')->name('admin.dashboard'); 



 
/*<!-- Route group -->*/
/*$router->group(['middleware' => 'auth'], function() {
*/

  /*  <!-- Admin Only -->*/
/*    if(Auth::check()){
        if ( Auth::user()->usertype == "Administrator" ){

*/
//Admin Home Routes
Auth::routes();
Route::get('/adminhome', 'AdminController@adminhome')->name('adminhome')->middleware('authenticated');


//PagesController
Auth::routes();
Route::any('delete/{id}', 'PagesController@destroy')->middleware('authenticated');
Auth::routes();
Route::any('deleteall', 'PagesController@destroyall')->middleware('authenticated');
 
//Manpower Routes
Auth::routes();
Route::get('/addmanpower', 'ManpowerController@addmanpower')->middleware('authenticated');
Auth::routes();
Route::post('/newrecord', 'ManpowerController@addnewmanpowerrecord')->middleware('authenticated');
Auth::routes();
Route::post('/doimport', 'ManpowerController@doimport')->middleware('authenticated');
Auth::routes();
Route::get('/uploadmanpower', 'ManpowerController@uploadmanpower')->middleware('authenticated');

//Manpower Editing
Auth::routes();	
Route::any('/editpersonalinfo/{id}', 'ManpowerController@editpersonalinfo')->middleware('authenticated');
Auth::routes();	
Route::any('/updatepersonalinfo/{id}', 'ManpowerController@updatepersonalinfo')->middleware('authenticated');
Auth::routes();	
Route::any('/updateprofilepicture/{id}', 'ManpowerController@updateprofilepicture')->middleware('authenticated');

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

//Photo Gallery
Auth::routes();	
Route::any('/album', 'AlbumController@index')->middleware('authenticated');
Auth::routes();	
Route::any('/uploadbanner', 'AlbumController@uploadbanner')->middleware('authenticated');

/*
    }

	}
});*/