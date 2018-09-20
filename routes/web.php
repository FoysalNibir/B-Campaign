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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
 	
	Route::get('dashboard', 'DashboardController@getDashboard')->name('dashboard');

 	Route::get('users', 'AdminController@getUsers')->name('users');
	Route::get('user/create', 'AdminController@getUserCreate')->name('user.create');
	Route::post('user/create', 'AdminController@postUserCreate')->name('user.create.post');
	Route::get('user/delete/{id}', 'AdminController@getUsersDelete')->name('user.delete');

	Route::get('dets', 'DetController@getDets')->name('dets');
	Route::get('det/create', 'DetController@getDetCreate')->name('det.create');
	Route::post('det/create', 'DetController@postDetCreate')->name('det.create.post');
	Route::get('det/delete/{id}', 'DetController@getDetDelete')->name('det.delete');
	Route::get('det/edit/{id}', 'DetController@getDetsEdit')->name('det.edit');
	Route::post('det/edit/{id}', 'DetController@postDetsEdit')->name('det.edit.post');

	Route::get('constituency', 'ConstituencyController@getConstituencies')->name('constituency');
	Route::get('constituency/create', 'ConstituencyController@getConstituencyCreate')->name('constituency.create');
	Route::post('constituency/create', 'ConstituencyController@postConstituencyCreate')->name('constituency.create.post');
	Route::get('constituency/edit/{id}', 'ConstituencyController@getConstituencyEdit')->name('constituency.edit');
	Route::post('constituency/edit/{id}', 'ConstituencyController@postConstituencyEdit')->name('constituency.edit.post');
	Route::get('constituency/delete/{id}', 'ConstituencyController@getConstituencyDelete')->name('constituency.delete');

	Route::get('images', 'ImageController@getImages')->name('images');
	Route::get('images/create', 'ImageController@getImageCreate')->name('images.create');
	Route::post('images/create', 'ImageController@postImageCreate')->name('images.create.post');
	Route::get('images/edit/{id}', 'ImageController@getImages')->name('images.edit');
	Route::get('images/delete/{id}', 'ImageController@getImages')->name('images.delete');
	
 
});
