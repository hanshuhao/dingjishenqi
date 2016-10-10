<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Request;
use Redirect;
use Mail;
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
            //查询登陆信息
            $users = DB::table('login')->where("username","=",$username)
                       ->where("password","=",$password)
                       ->first();                             
            if($users)
            {
                Session::put('uid',$users['id']);
                //获取用户信息
                $data = DB::table('users')->select('uname','integral')->where('loginid',$users['id'])->first();
                if(!$data)
                {
                    Session::put('uname',$users['username']);
                    Session::put('discount','0');
                }
                else
                {
                    Session::put('uname',$data['uname']);
                    $integral = DB::table('integral')->select('level')->where('min','<=',$data['integral'])->where('max','>',$data['integral'])->first();
                    Session::put('discount',$integral['level']*10/100);
                }
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
        //var_dump($arr);die;
        $res['username'] = $arr['username'];
        $res['password'] = md5($arr['password']);
        //验证邮箱验证码
        if($arr['check_email'] != Session::get('check_email'))
        {
            $message="邮箱验证码不正确";
            $time="3";
            $contro="register";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
            return false;
        }
        Session::forget('check_email');
        $preg='/^[a-zA-Z0-9\x{4e00}-\x{9fa5}]{2,20}$/u';
             if(!preg_match($preg,$arr['username'])){
                 $message="用户名格式不正确，请重新输入";
                 $time="3";
                 $contro="register";
                 return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
                 return false;
             }
        $res['type'] = $arr['type'];
        $res['email'] = $arr['email'];
        $date=date("Y-m-d H:i:s");
        $res['logintime'] = $date;
        $return = DB::table('login')->insertGetId($res);//获取插入的id
        if($return)
        {
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
     * [check_email 验证邮箱]
     * @return [arr] []
     */
    public function check_email()
    {   
        //获取信息
        $arr = Request::input();
        $email = $arr['email'];
        //生成验证码
        $code = rand(1000,9999);
        //保存验证码
        Session::put('check_email',$code);
        $content = "您使用了本邮箱注册定机神器，请在注册页面输入验证码：".$code;
        //发送验证码
        $flag = Mail::send('user.test',['name'=>$content],function($message)use($email){
            $message ->to($email)->subject('定机神器邮箱验证');
        });
        if($flag)
        {
            $data['message']="发送成功";
            $data['success'] = 2;
        }
        else
        {
            $data['message']="发送失败";
            $data['success'] = 1;
        }
        echo json_encode($data);
    }

     /**
      * [logout 退出]
      */
    public  function  logout()
    {
        Request::session()->flush();
        return Redirect('index');
    }
    
    /**
     * [savePass 邮箱找回密码]
     * @return [type] [description]
     */
    public function savePass()
    {
        return view('login.savepass');
    }
}
