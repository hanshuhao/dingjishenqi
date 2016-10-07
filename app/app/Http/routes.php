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

//登录
Route::get('/',"IndexController@index");
Route::any('welcome',"LoginController@welcome");
//登录页面
Route::any('login',"LoginController@login");
//登录验证
Route::any('login_do',"LoginController@login_do");
//注册页面
Route::any('register',"LoginController@register");
//注册入库
Route::any('register_do',"LoginController@register_do");
//退出
Route::any('logout',"LoginController@logout");
//首页
Route::any('index',"IndexController@index");
//选择网吧
Route::any('select',"IndexController@select");
//结算价格
Route::any('money',"IndexController@money");
//付账
Route::any('account',"IndexController@account");


/*商户页面*/
Route::get("merchant",'MerchantController@index');
Route::get("news",'MerchantController@news');
Route::get("uplodes",'MerchantController@uplodes');
Route::get("price",'MerchantController@price');
Route::get("pricelist",'MerchantController@pricelist');
Route::get("prupdates",'MerchantController@prupdates');
Route::post("price_do",'MerchantController@price_do');
Route::post("pruplist",'MerchantController@pruplist');
Route::get("indent",'MerchantController@indent');
Route::post("add",'MerchantController@add');
Route::post("uplodes_do",'MerchantController@uplodes_do');


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