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

Route::get('profile', ['as' => 'getProfile', 'uses' => 'UserController@getProfile']);
Route::post('profile', ['as' => 'postProfile', 'uses' => 'UserController@postProfile']);

Route::get('settings', ['as' => 'getSettings', 'uses' => 'UserController@getSettings']);
Route::post('settings', ['as' => 'postSettings', 'uses' => 'UserController@postSettings']);

Route::get('histories', ['as' => 'histories', 'uses' => 'HistoriesLoginController@index']);

Route::get('/user/create', ['as' => 'usercreate', 'uses' => 'UserController@getCreate']);
Route::post('/user/create', ['as' => 'usercreate', 'uses' => 'UserController@postCreate']);

Route::get('/user/update/{id}', ['as' => 'userupdate', 'uses' => 'UserController@getUpdate']);
Route::post('/user/update/{id}', ['as' => 'userupdate', 'uses' => 'UserController@postUpdate']);

Route::get('/users', ['as' => 'userlist', 'uses' => 'UserController@index']);
Route::get('/user/view/{id}', ['as' => 'userview', 'uses' => 'UserController@view']);

Route::get('/user/changepass/{id}', ['as' => 'userchangepass', 'uses' => 'UserController@getChangePass']);
Route::post('/user/changepass/{id}', ['as' => 'userchangepass', 'uses' => 'UserController@postChangePass']);

Route::get('/user/changepasspharse/{id}', ['as' => 'userchangepasspharse', 'uses' => 'UserController@getChangePassPharse']);
Route::post('/user/changepasspharse/{id}', ['as' => 'userchangepasspharse', 'uses' => 'UserController@postChangePassPharse']);

Route::get('/attendances/{grade}', ['as' => 'attendances', 'uses' => 'StudentController@attendances']);
Route::post('/attendance/{time}', ['as' => 'attendance', 'uses' => 'AttendanceController@attendance']);

Route::get('grades', ['as' => 'grades', 'uses' => 'GradeController@index']);
Route::get('/grade/view/{id}', ['as' => 'gradeview', 'uses' => 'GradeController@view']);
Route::get('/grade/delete/{id}', ['as' => 'gradedelete', 'uses' => 'GradeController@delete']);

Route::get('/grade/create', ['as' => 'gradecreate', 'uses' => 'GradeController@getCreate']);
Route::post('/grade/create', ['as' => 'gradecreate', 'uses' => 'GradeController@postCreate']);

Route::get('/grade/update/{id}', ['as' => 'gradeupdate', 'uses' => 'GradeController@getUpdate']);
Route::post('/grade/update/{id}', ['as' => 'gradeupdate', 'uses' => 'GradeController@postUpdate']);
