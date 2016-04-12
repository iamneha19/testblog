<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(['middleware' => 'auth'], function() {
Route::get('mypost','PostController@mypost');
Route::post('add_post',['as'=>'addpost','uses'=>'PostController@createPost']);
Route::post('delete_post','PostController@DeletePost');
Route::get('get_post/{id}',['as'=>'get_post','uses'=>'PostController@getPost']);
Route::post('update_post',['as'=>'updatepost','uses'=>'PostController@updatePost']);
});
Route::get('/','PostController@allposts');
