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
    /**
     * [welcome 登录]
     * @return [type] [description]
     */
    public function  welcome()
    {
        return  view("login.login");
    }

    /**
     * [login_do 验证 登录]
     * @return [type] [description]
     */
    public function  login_do()
    {
        $username = Request::input('username');
        $password = md5(Request::input('password'));
        //print_r($username);die;
        $preg='/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]{2,20}$/u';
        if(!preg_match($preg,$username)){
            redirect('errors');
           // return false;
        }
        if($username=="" ||  $password=="")
        {
            $message="请填写表单";
            $time="4";
            $contro="welcome";
            //传参报错。传不了。得定全局变量
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
        else
        {
            $users = DB::table('login')->where("username","=",$username)
                       ->where("password","=",$password)
                       ->first();                             
            if($users)
            {
                Session::put('uid',$users['id']);
                Session::put('uname',$users['username']);
                Session::put('type',$users['type']);
                //登录时间
                $date  =date("Y-m-d H:i:s");
                DB::table('login')->where('id','=',$users['id'])->update(['logintime' => $date]);
                return  Redirect('index');
            }
            else
            {
                $message="用户名或密码错误，请重新输入";
                $time="2";
                $contro="welcome";
                return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
            }
        }      
    }


    /**
     * [register 验证 登录]
     * @return [type] [description]
     */
    public function  register()
    {
            return  view("login.register");
    }

    /**
     * [register_do 验证 注册 入库]
     * @return [type] [description]
     */
    public function  register_do()
    {
        $arr= Request::input();
        $res['username'] = $arr['username'];
        $res['password'] = md5($arr['password']);

        $preg='/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]{2,20}$/u';
             if(!preg_match($preg,$arr['username'])){
                 $message="用户名格式不正确，请重新输入";
                 $time="4";
                 $contro="register";
                 return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
                 return false;
             }
        $res['type'] = $arr['type'];
        $date=date("Y-m-d H:i:s");
        $res['logintime'] = $date;
        $return = DB::table('login')->insertGetId($res);//获取插入的id
        if($return)
        {
            if($arr['id']!=""){
                $id=$arr['id'];
                $str=DB::table('login')->where('id','=',$id)->first();
                $str=DB::table('users')->where("loginid",'=',$str['id'])->first();
                $integral=$str['integral']+20;
                $arr=DB::table('users')->where('id',$str['id'])->update(['integral'=>$integral]);
            }
            Session::put('uid',$return);
            Session::put('uname',$arr['username']);
            Session::put('type',$arr['type']);
            $message="注册成功";
            $time="2";
            $contro="index";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
        else
        {
            $message="注册失败,请核对你的信息";
            $time="4";
            $contro="register";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
    }
    

     /**
      * [logout 退出]
      */
    public  function  logout()
    {
        Request::session()->flush();
        return Redirect('index');
    }
  
}
