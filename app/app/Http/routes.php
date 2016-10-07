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

//首页
Route::get('/',"IndexController@index");
Route::get('index',"IndexController@index");
//登录页面
Route::any('welcome',"LoginController@welcome");
//注册页面
Route::any('register',"LoginController@register");
     
Route::any('login',"LoginController@login");
//登录验证
Route::any('login_do',"LoginController@login_do");
//注册入库
Route::any('register_do',"LoginController@register_do");
//错误页面
Route::any('errors',"LoginController@errors");

//防非法登录
Route::group(['middleware' => ['webs']], function () {

//退出
Route::any('logout',"LoginController@logout");

//选择网吧
Route::any('select',"IndexController@select");
//结算价格
Route::post('money',"IndexController@money");
//付账
Route::any('account',"IndexController@account");


/*商户页面*/
Route::get("merchant",'MerchantController@index');
Route::get("news",'MerchantController@news');
Route::get("uplodes",'MerchantController@uplodes');
Route::get("addNum",'MerchantController@addNum');
Route::post("add",'MerchantController@add');
Route::post("numadd",'MerchantController@numAdd');
Route::post("uplodes_do",'MerchantController@uplodes_do');


//个人中心
Route::get('user/index','UsersController@index');
Route::get('user/save','UsersController@save');
Route::get('user/list','UsersController@lists');
Route::get('user/pass','UsersController@pass');
Route::post('user/info','UsersController@info');
});
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