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
    	    $password = md5(Request::input('password'));
          //print_r($username);die;
          if($username=="" ||  $password==""){
            echo "<script>alert('请填写表单啊亲~');location.href='welcome';</script>" ;
          }else{
            $users = DB::table('login')->where("username","=",$username)
                                       ->where("password","=",$password)
                                       ->first();                             
            if($users){
                 Session::put('uid',$users['id']);
                 Session::put('uname',$users['username']);
                 //登录时间
                 $date  =date("Y-m-d H:i:s");
                 DB::table('login')->where('id','=',$users['id'])->update(['logintime' => $date]);
                 return Redirect('index');
                
            }else{
                echo "<script>alert('登录失败');location.href='welcome';</script>" ;
            }
          }      
    }
    //验证 登录
    public function  register(){
       return  view("login.register");  
  }
   //验证 注册 入库
    public function  register_do(){
       $arr= Request::input();
       //var_dump($arr);
       $res['username'] = $arr['username'];
       $res['password'] = md5($arr['password']);
       $res['type'] = $arr['type'];
       $date=date("Y-m-d H:i:s");
       $res['logintime'] = $date;
       $return = DB::table('login')->insertGetId($res);//获取插入的id
       if($return){
          Session::put('uid',$return);
          Session::put('uname',$arr['username']);
          return Redirect('index');
             
        }else{
          echo "<script>alert('注册失败');location.href='register';</script>";
        }
  }

  /*///首页
    public function  lists(){
       
          echo  "首页";
       }*/
  
}