<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Request;
use Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

 class LoginController extends Controller
{   
	  //登录
    public function  welcome(){
       return  view("login.login");
    }
    //验证 登录
    public function  login_do(){
          $username = Request::input('username');
    	    $password = Request::input('password');
         	$users = DB::table('login')->where("username","=",$username)
                                     ->where("password","=",$password)->first();
         	if($users){
             Session::put('user',$username);
             echo "<script>alert('登录成功');location.href='lists'</script>";
          }else{
             echo "<script>alert('用户名或密码错误');location.href='welcome'</script>";
          }
    }
    //验证 登录
    public function  lists(){
	      echo 13;
  }
  
}
