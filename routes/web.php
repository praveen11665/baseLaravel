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
    //return view('welcome');
    return redirect('/login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

	//Users Management
	Route::get('/user', 'UserController@index')->name('user');
});
