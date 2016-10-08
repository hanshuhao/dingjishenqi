<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	/**
	 * [index 个人中心显示]
	 */
	public function index()
	{
		//查询个人信息
		$data = DB::table('users')->where('loginid',Session::get('uid'))->first();
		return view('user/index',$data);
	}

	/**
	 * [index 个人信息修改页面]
	 */
	public function save()
	{
		//查询个人信息
		$arr = DB::table('users')->where('loginid','=',Session::get('uid'))->first();
		return view('user/save',$arr);
	}

	/**
	 * [info 个人信息修改]
	 * @return [type] [description]
	 */
	public function info(Request $request)
	{
		//接收数据
		$arr = $request->all();
		//验证非空
		foreach ($arr as $k => $v) {
			if($k != "myfile")
			{
				if(empty($v))
				{
					$message="除头像外，不可有空值";
	                $time="2";
	                $contro="save";
	                return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
				}
			}
		}
		//处理头像
		if ($request->hasFile('myfile')) {

			//设置路径与重命名
			$fileName = time().rand(1000,9999);	//设置文件名
			$path = 'uploads/user';
			$mime = $request->file('myfile')->getClientOriginalExtension();	//获取文件后缀
			$request->file('myfile')->move($path, $fileName.'.'.$mime);	//移动文件
			$data['uphoto'] = $path.'/'.$fileName.'.'.$mime;	//保存文件路径
		}

		//数据操作
		$data['uname'] = $arr['uname'];
		$data['sex'] = $arr['sex'];
		$data['IDcard'] = $arr['IDcard'];
		$data['email'] = $arr['email'];
		$data['loginid'] = Session::get('uid');
		
		//数据入库
		$res = DB::table('users')->where('loginid',Session::get('uid'))->first();
		if($res)
		{
			$re = DB::table('users')->where('loginid',Session::get('uid'))->update($data);
		}
		else
		{
			$re = DB::table('users')->insert($data);
		}

		//判断
		if($re)
		{
			$message="信息更新成功";
		}
		else
		{
			$message="信息更新失败";
		}
        $time="2";
        $contro="save";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
	}

	/**
	 * [lists 显示定机历史]
	 */
	public function lists()
	{
		//查询个人信息
		$arr = DB::table('login')->where('id','=',Session::get('uid'))->first();
		//查询定机信息
		$data = DB::table('invoice')->where('loginid','=',Session::get('uid'))->get();
		return view('user/list',['username'=>$arr['username'],"data"=>$data]);
	}

	/**
	 * [pass 修改用户密码]
	 */
	public function pass()
	{
		//查询个人信息
		$arr = DB::table('login')->where('id','=',Session::get('uid'))->first();
		return view('user/pass',$arr);
	}

	/**
	 * [passSave 修改密码]
	 */
	public function passSave(Request $request)
	{
		$arr = $request->all();
		//验证非空
		foreach ($arr as $k => $v) {
			if(empty($v))
			{
				$message="不可有空值";
				$time="2";
	        	$contro="pass";
	        	return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
			}
		}
		//查询用户原密码
		$data = DB::table('login')->select('password')->where('id',Session::get('uid'))->first();
		if(md5($arr['oldpass']) != $data['password'] || $arr['newpass'] != $arr['qpass'])
		{
			//验证原密码
			if(md5($arr['oldpass']) != $data['password'])
			{
				$message="原密码不正确";
			}
			//验证新密码
			if($arr['newpass'] != $arr['qpass'])
			{
				$message="两次密码输入不一致";
			}

			//错误提示
			$time="2";
	        $contro="pass";
	        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
		}
		$date['password'] = md5($arr['newpass']);
		//修改
		$res = DB::table('login')->where('id',Session::get('uid'))->update($date);
		if($res)
		{
			$message="修改成功";
			$time="1";
		}
		else
		{
			$message="修改失败";
			$time="2";
		}
	 	$contro="pass";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
	}

	/**
	 * [AJAXpass ajax验证密码]
	 */
	public function AJAXpass(Request $request)
	{
		$arr = $request->all();
	}
}
