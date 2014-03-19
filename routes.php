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
Route::get('/', function()
{
	return View::make('hello');
});
*/
Route::get('/','ArticlesController@index');
Route::group(array('before'=>'auth'),function()
{
	Route::any('add_article','ArticlesController@add_article');
	Route::any('edit_article','ArticlesController@edit_article');
	Route::get('logout','ArticlesController@logout');
});
Route::any('login','ArticlesController@login');
