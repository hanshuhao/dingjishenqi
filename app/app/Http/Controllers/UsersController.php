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
		$arr = DB::table('login')->where('id',Session::get('uid'))->first();
		$data = DB::table('users')->where('loginid',Session::get('uid'))->first();
		$data['username'] = Session::get('uname');
		return view('user/index',$data);
	}

	/**
	 * [index 个人信息修改页面]
	 */
	public function save()
	{
		//查询个人信息
		$arr = DB::table('login')->where('id','=',Session::get('uid'))->first();
		return view('user/save',['username'=>$arr['username']]);
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
					echo "<script>alert('除头像外，不可有空值');location.href='save'</script>";exit;
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
			echo "<script>alert('信息更新成功');location.href='save'</script>";exit;
		}
		else
		{
			echo "<script>alert('信息更新失败');location.href='save'</script>";exit;
		}
	}

	/**
	 * [lists 显示定机历史]
	 */
	public function lists()
	{
		//查询个人信息
		$arr = DB::table('login')->where('id','=',Session::get('uid'))->first();
		return view('user/list',['username'=>$arr['username']]);
	}
}
