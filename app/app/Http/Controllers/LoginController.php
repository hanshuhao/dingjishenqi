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
          //print_r($username);die;
          if($username=="" ||  $password==""){
            echo "<script>alert('请填写表单啊亲~');location.href='welcome';</script>" ;
          }else{
            $users = DB::table('login')->where("username","=",$username)
                                       ->where("password","=",$password)
                                       ->first();
                                       //var_dump($users->id);die;
            if($users){
                 Session::put('uid',$users->id);
                 Session::put('uname',$users->username);
                echo "<script>alert('登录成功');location.href='lists';</script>" ;
            }else{
                echo "<script>alert('登录失败');location.href='welcome';</script>" ;
            }
          }
        	
         
    }
    //验证 登录
    public function  register(){
      return  view("login.register");  
  }
   //验证 注册
    public function  register_do(){
       $arr= Request::input();
       var_dump($arr);
          
  }
}

