<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::post('login', 'API\LoginController@login');

Route::post('register', 'API\LoginController@register');

Route::group(['middleware' => 'auth:api'], function(){

	Route::get('users', 'API\UserController@getUsers');
	Route::post('users/create', 'API\UserController@postUserCreate');
	Route::get('users/delete/{id}', 'API\UserController@getUsersDelete')->where('id', '[0-9]+');

	Route::get('dets', 'API\DetController@getDets');
	Route::get('dets/{id}', 'API\DetController@getDet')->where('id', '[0-9]+');
	Route::post('dets/create', 'API\DetController@postDetCreate');
	Route::get('dets/delete/{id}', 'API\DetController@getDetDelete')->where('id', '[0-9]+');
	Route::post('dets/update/{id}', 'API\DetController@postDetsEdit')->where('id', '[0-9]+');

	Route::get('detnames', 'API\ConstituencyController@getDetNames');
	Route::get('constituencies', 'API\ConstituencyController@getConstituencies');
	Route::get('constituencies/{id}', 'API\ConstituencyController@getConstituency')->where('id', '[0-9]+');
	Route::post('constituencies/create', 'API\ConstituencyController@postConstituencyCreate');
	Route::get('constituencies/delete/{id}', 'API\ConstituencyController@getConstituencyDelete')->where('id', '[0-9]+');
	Route::post('constituencies/update/{id}', 'API\ConstituencyController@postConstituencyEdit')->where('id', '[0-9]+');

	Route::get('constituencynames', 'API\ImageController@getConstituencyNames');
	Route::get('images/{id}', 'API\ImageController@getImages')->where('id', '[0-9]+');
	Route::post('images/create', 'API\ImageController@postImageCreate');
	Route::get('images/delete/{id}', 'API\ImageController@getImageDelete')->where('id', '[0-9]+');
	Route::post('images/update/{id}', 'API\ImageController@postImageUpdate')->where('id', '[0-9]+');

	Route::get('videos/{id}', 'API\VideoController@getVideos')->where('id', '[0-9]+');
	Route::post('videos/create', 'API\VideoController@postVideoCreate');
	Route::get('videos/delete/{id}', 'API\VideoController@getVideoDelete')->where('id', '[0-9]+');
	Route::post('videos/update/{id}', 'API\VideoController@postVideoUpdate')->where('id', '[0-9]+');

	Route::get('threat/{id}', 'API\ThreatController@getThreats')->where('id', '[0-9]+');
	Route::post('threat/create', 'API\ThreatController@postThreatCreate');
	Route::get('threat/delete/{id}', 'API\ThreatController@getThreatDelete')->where('id', '[0-9]+');
	Route::post('threat/update/{id}', 'API\ThreatController@postThreatUpdate')->where('id', '[0-9]+');

	Route::get('dash', 'API\DashboardController@test');

});