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

//Facebook
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

//Google
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/', function () {
    //return view('welcome');
    return redirect('/login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

	//Users Management
	Route::get('/user', 'UserController@index')->name('user');

	//Role
	Route::get('/role', 'RoleController@index')->name('role');
	/*Route::get('/role/form', 'RoleController@ajaxFormView')->name('role_form');*/

	Route::match(['GET', 'POST'], '/role/form', [
    	'uses' => 'RoleController@ajaxFormView'
	])->name('role_form');
	
	Route::get('role/delete/{id}', 'RoleController@delete')->name('delete_role');	
});
