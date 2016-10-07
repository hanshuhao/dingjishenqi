<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
header("content-type:text/html;charset=utf-8");
class AdminController extends BaseController
{
	public function admin()
	{
		return view("admin.admin");
	}

	/**
	 * [users_show 用户查看]
	 * @return [type] [description]
	 */
	public function users_show()
	{
		$arr['users'] = DB::table('users')->where("type",'=','1')->rightJoin('login', 'users.loginid', '=', 'login.id')->get();
		//print_r($arr);die;
		return view("admin.users_show",$arr);
	}

	/**
	 * [internet_bar 网吧查看]
	 * @return [type] [description]
	 */
	public function internet_bar()
	{
		$arr['users'] = DB::table('internet_bar')->where("type",'=','2')->rightjoin('login', 'internet_bar.loginid', '=', 'login.id')->get();
		//print_r($arr);die;
		return view("admin.internet_bar",$arr);
	}


	/**
	 * [invoice 发票查看]
	 * @return [type] [description]
	 */
	public function invoice()
	{
		$arr['invoice'] = DB::table('invoice')->select()->get();
		//print_r($arr);die;
		return view("admin.invoice",$arr);
	}

	/**
	 * [yes 网吧审核成功]
	 * @return [type] [description]
	 */
	public function yes()
	{
		$id = $_GET['id'];
		$res = DB::table('internet_bar')->where("id",$id)->update(['status'=>'1']);
		return redirect("internet_bar");
	}

	/**
	 * [no 网吧审核失败]
	 * @return [type] [description]
	 */
	public function no()
	{
		$id = $_GET['id'];
		$res = DB::table('internet_bar')->where("id",$id)->update(['status'=>'-1']);
		return redirect("internet_bar");
	}
}