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

Route::get('/', function () {
    return view('login.signin');
});


//后台登录
Route::post('/login_do','LoginController@login_do');
Route::get("/admin",'AdminController@admin');
Route::get("/users_show",'AdminController@users_show');
Route::get("/internet_bar",'AdminController@internet_bar');
Route::get("/invoice",'AdminController@invoice');
Route::get("/yes",'AdminController@yes');
Route::get("/no" , 'AdminController@no');
Route::any("/updstate" , 'AdminController@updstate');

//积分
Route::any("/integral" , 'IntegralController@integral');
//积分等级修改
Route::any("/integralUpdate" , 'IntegralController@integralUpdate');
Route::any("/integralUpdate_do" , 'IntegralController@integralUpdate_do');
//积分等级修改名称
Route::any("/type" , 'IntegralController@type');
//积分等级修改max
Route::any("/max" , 'IntegralController@max');
//积分等级修改max
Route::any("/min" , 'IntegralController@min');
//添加
Route::any("add" , 'IntegralController@add');
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

Route::group(['middleware' => ['web']], function () {
    //
});
