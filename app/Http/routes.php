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
Route::get('login', ['as' => 'getLogin', 'uses' => 'SiteController@getLogin'])->middleware('login');
Route::post('login', ['as' => 'postLogin', 'uses' => 'SiteController@postLogin']);

Route::get('profile', ['as' => 'getProfile', 'uses' => 'UserController@getProfile']);
Route::post('profile', ['as' => 'postProfile', 'uses' => 'UserController@postProfile']);

Route::get('changemypassword', ['as' => 'getMyChangePassword', 'uses' => 'UserController@getMyChangePassword']);
Route::post('changemypassword', ['as' => 'postMyChangePassword', 'uses' => 'UserController@postMyChangePassword']);

Route::get('histories', ['as' => 'histories', 'uses' => 'HistoriesLoginController@index'])->middleware('admin');

Route::get('/user/create', ['as' => 'usercreate', 'uses' => 'UserController@getCreate'])->middleware('admin');
Route::post('/user/create', ['as' => 'usercreate', 'uses' => 'UserController@postCreate'])->middleware('admin');

Route::get('/user/update/{id}', ['as' => 'userupdate', 'uses' => 'UserController@getUpdate'])->middleware('admin');
Route::post('/user/update/{id}', ['as' => 'userupdate', 'uses' => 'UserController@postUpdate'])->middleware('admin');

Route::get('/users', ['as' => 'userlist', 'uses' => 'UserController@index'])->middleware('admin');
Route::get('/user/view/{id}', ['as' => 'userview', 'uses' => 'UserController@view'])->middleware('admin');;

Route::get('/user/changepass/{id}', ['as' => 'userchangepass', 'uses' => 'UserController@getChangePass']);
Route::post('/user/changepass/{id}', ['as' => 'userchangepass', 'uses' => 'UserController@postChangePass']);

Route::get('/user/changepasspharse/{id}', ['as' => 'userchangepasspharse', 'uses' => 'UserController@getChangePassPharse'])->middleware('admin');
Route::post('/user/changepasspharse/{id}', ['as' => 'userchangepasspharse', 'uses' => 'UserController@postChangePassPharse'])->middleware('admin');
Route::get('/user/getTeacher/{id}', ['as' => 'userview', 'uses' => 'UserController@getTeacherOfBranch']);

Route::get('/attendance', ['as' => 'attendances', 'uses' => 'StudentController@getAttendance']);
Route::post('/attendance/{time}', ['as' => 'attendances', 'uses' => 'AttendanceController@postAttendance']);
Route::get('/attendances', ['as' => 'attendances', 'uses' => 'StudentController@attendances']);

Route::get('grades', ['as' => 'grades', 'uses' => 'GradeController@index'])->middleware('admin');
Route::get('/grade/view/{id}', ['as' => 'gradeview', 'uses' => 'GradeController@view'])->middleware('admin');
Route::get('/grade/delete/{id}', ['as' => 'gradedelete', 'uses' => 'GradeController@delete'])->middleware('admin');

Route::get('/grade/create', ['as' => 'gradecreate', 'uses' => 'GradeController@getCreate'])->middleware('admin');
Route::post('/grade/create', ['as' => 'gradecreate', 'uses' => 'GradeController@postCreate'])->middleware('admin');

Route::get('/grade/update/{id}', ['as' => 'gradeupdate', 'uses' => 'GradeController@getUpdate'])->middleware('admin');
Route::post('/grade/update/{id}', ['as' => 'gradeupdate', 'uses' => 'GradeController@postUpdate'])->middleware('admin');

Route::get('/hoc-ba-van-khoa', ['as' => 'endyear', 'uses' => 'SiteController@hocBaVanKhoa'])->middleware('admin');
Route::post('/get_history', ['as' => 'get_history', 'uses' => 'SiteController@getHistory'])->middleware('admin');
Route::post('/endOfYear', ['as' => 'endOfYear', 'uses' => 'SiteController@endOfYear'])->middleware('admin');
Route::get('/confirmEndYear', ['as' => 'confirmEndYear', 'uses' => 'SiteController@confirmEndYear'])->middleware('admin');
Route::get('/backCurrent', ['as' => 'backCurrent', 'uses' => 'SiteController@backCurrent'])->middleware('admin');

Route::get('/students', ['uses' => 'StudentController@index']);
Route::get('/student/formList', ['as' => 'formList', 'uses' => 'StudentController@formList']);
Route::get('/student/enrolment', [ 'uses' => 'StudentController@enrolment']);
Route::post('/student/enrolment', [ 'uses' => 'StudentController@add']);
Route::get('/student/outStanding', [ 'uses' => 'StudentController@outStanding'])->middleware('admin');;

Route::get('/student/update/{id}', ['as' => 'studentupdate', 'uses' => 'StudentController@getUpdate']);
Route::post('/student/update/{id}', ['as' => 'studentupdate', 'uses' => 'StudentController@postUpdate']);

Route::get('/student/view/{id}', ['as' => 'userview', 'uses' => 'StudentController@view']);
Route::get('/student/delete/{id}', ['as' => 'userview', 'uses' => 'StudentController@delete'])->middleware('admin');;
Route::get('/student/getClass/{id}', ['as' => 'userview', 'uses' => 'StudentController@getClassOfBranch']);

Route::get('/error', ['as' => 'error', 'uses' => 'ErrorController@index']);