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
          }
          //数据库验证用户
          //$user = DB::table('users')->where('name', 'John')->first();
          // $date=DB::table('users')->where("username",$username)->first();
          // print_r($date);die;
          echo $username,$password;
        	$users = DB::table('login')->where("username","=",$username)
                                     ->where("password","=",$password)->first();
          var_dump($users);die;
    }
    //验证 登录
    public function  lists(){
	      echo 13;
  }
  
}

