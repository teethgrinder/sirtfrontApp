<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$user = Sentry::getUser();
	return View::make('hello')->with('user', $user);
});

Route::resource('shares', 'ShareController');

Route::group(['prefix' => 'api/v1/'], function(){
	Route::get('posts/{id}/tags', 'TagsController@index');
	Route::resource('users', 'UsersController');
	Route::resource('posts', 'PostsController');
	Route::resource('tags', 'TagsController');
	Route::post('/auth/login', array('before' => 'csrf_json', 'uses' => 'AuthController@login'));
	// Route::post('/auth/login', array( 'uses' => 'AuthController@login'));
	Route::get('/auth/logout', 'AuthController@logout');
	Route::get('/auth/status', 'AuthController@status');
	Route::get('/auth/secrets','AuthController@secrets');
	Route::get('/auth/csrf_token', function() {
		
	  	return Response::json(array('csrf_token' => csrf_token()));
	});

});

