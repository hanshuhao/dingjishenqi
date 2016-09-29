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


	public function users_show()
	{
		$arr['users'] = DB::table('users')->rightJoin('login', 'users.loginid', '=', 'login.id')->get();
		//print_r($arr);die;
		return view("admin.users_show",$arr);
	}

	public function internet_bar()
	{
		$arr['users'] = DB::table('internet_bar')->leftjoin('login', 'internet_bar.loginid', '=', 'login.id')->get();
		//print_r($arr);die;
		return view("admin.internet_bar",$arr);
	}

	public function invoice()
	{
		$arr['invoice'] = DB::table('invoice')->select()->get();
		//print_r($arr);die;
		return view("admin.invoice",$arr);
	}
}