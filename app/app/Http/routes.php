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
//忘记密码
Route::any('savepass',"LoginController@savePass");
//密码找回邮箱
Route::any('pass_do',"LoginController@pass_do");
//修改密码页面
Route::any('password',"LoginController@password");
//修改密码
Route::any('password_save',"LoginController@password_save");
//注册页面
Route::any('register',"LoginController@register");
//验证邮箱
Route::any('check_email',"LoginController@check_email");

     
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

    //网吧详细信息
    Route::any('select',"IndexController@select");
    //选择网吧
    Route::any('select_do',"IndexController@select_do");
    //结算价格
    Route::post('money',"IndexController@money");
    //付账
    Route::any('account',"IndexController@account");
    //是否下机
    Route::any('xiaji',"IndexController@xiaji");
    //支付接口
    Route::any('pay',"IndexController@pay");
    //支付成功
    Route::any('notify_url',"IndexController@notify_url");
    //支付失败
    Route::any('return_url',"IndexController@return_url");
    //网吧评论   
    Route::get("comment","IndexController@comment");
    //网吧评论显示
    Route::get("comment_show",'IndexController@comment_show');
    //网吧评论删除
    Route::get("comment_del",'IndexController@comment_del');
    //网吧点赞
    Route::get("dianzan","IndexController@dianzan");

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
    Route::get("addNum",'MerchantController@addNum');
    Route::post("add",'MerchantController@add');
    Route::post("numadd",'MerchantController@numAdd');
    Route::post("uplodes_do",'MerchantController@uplodes_do');
    Route::any("addad",'MerchantController@addad');
    Route::any("addinto",'MerchantController@addinto');

    //个人中心
    Route::get('user/index','UsersController@index');
    Route::get('user/save','UsersController@save');
    Route::get('user/list','UsersController@lists');
    Route::get('user/vip','UsersController@vip');
    Route::get('user/pass','UsersController@pass');
    Route::post('user/info','UsersController@info');
    Route::post('user/passsave','UsersController@passSave');
    Route::any('user/invite_do','UsersController@invite_do');
    Route::get('user/invite','UsersController@invite');
    Route::get('user/enroll','UsersController@enroll');
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