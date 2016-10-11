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
            if(isset($arr['id'])){
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

    /**
     * [pass_do 通过邮箱和账号查询要修改的账号]
     */
    public function pass_do()
    {
        $arr = Request::input();
        $email = $arr['email'];
        if(!$arr)
        {
            $message="非正常访问";
            $time="2";
            $contro="welcome";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
        //查询登陆信息
        $users = DB::table('login')->select('id')->where("username",$arr['username'])->where("email",$email)->first();
        if(!$users)
        {
            $message="用户名或邮箱不正确";
            $time="2";
            $contro="savepass";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
        //发送邮件
        $left = rand(1000,9999);
        $right = rand(100,999);
        $content = "您正通过邮箱修改定机神器的密码，请点击<a href='www.app.com/password?id=".$left.$users['id'].$right."'>跳转</a>。";
        $flag = Mail::send('user.test',['name'=>$content],function($message)use($email){
            $message ->to($email)->subject('定机神器邮箱验证');
        });
        if($flag)
        {
            $message="发送成功，请注意查收";
        }
        else
        {
            $message="发送失败";
      }
      $time="2";
      $contro="welcome";
      return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
    }

    /**
     * [password 显示修改页面]
     * @return [type] [description]
     */
    public function password()
    {
      $arr = Request::input();
      if(!$arr)
      {
        $message="非法访问";
        $time="2";
        $contro="welcome";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
      }
      //获取id
      $data['id'] = substr($arr['id'],4,-3);
      return view('login.pass_do',$data);
    }
    /**
     * [password_save 密码修改]
     */
    public function password_save()
    {
      //获取数值
      $arr = Request::input();

      if(!$arr)
      {
          $message="非正常访问";
          $time="2";
          $contro="welcome";
          return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
      }
      //验证
      $res = DB::table('login')->select('password')->where('id',$arr['id'])->where('password',md5($arr['password']))->first();
      if($res)
      {
        $message="不可与原密码一致";
        $time="2";
        $contro="savepass";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
      }
      if($arr['password'] != $arr['confirm_password'])
      {
        $message="两次密码输入不一致";
        $time="2";
        $contro="savepass";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
      }
      //修改
      $re = DB::table('login')->where('id',$arr['id'])->update(['password'=>md5($arr['password'])]);
      if($re)
      {
        $message="修改成功";
      }
      else
      {
        $message="修改失败";
      }
      $time="2";
      $contro="welcome";
      return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
      var_dump($arr);
    }
}
