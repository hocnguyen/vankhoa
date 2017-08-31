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
/*Route::get('/', array('as'=> 'index','uses' => 'IndexController@index'));*/
Route::get('/','IndexController@index');
Route::get('logout', 'IndexController@logout');
Route::get('login', ['as' => 'getLogin', 'uses' => 'SiteController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'SiteController@postLogin']);