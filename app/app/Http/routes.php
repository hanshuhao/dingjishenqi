<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',"LoginController@welcome");
Route::any('welcome',"LoginController@welcome");
Route::any('login',"LoginController@login");
Route::any('login_do',"LoginController@login_do");
Route::any('lists',"LoginController@lists");
Route::any('register',"LoginController@register");
Route::any('register_do',"LoginController@register_do");


//个人中心
Route::get('user/index','UsersController@index');
Route::get('user/save','UsersController@save');
Route::get('user/list','UsersController@lists');
Route::post('user/info','UsersController@info');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Route::group(['middleware' => ['web']], function () {
    //
});
*/