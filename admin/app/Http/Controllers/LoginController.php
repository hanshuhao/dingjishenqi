<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


/**
* 
*/
class LoginController extends BaseController
{
	public function login_do(Request $request)
	{
		$username = Request::input('username');
    	$password = Request::input('password');
		$res = DB::table('admin')->where("username",$username)->first();
		if($res){
			if($res->password == $password){
				Session::put("username",$username);
				Session::put("photo",$res->photo);
				return redirect("admin");
			}else{
				echo "<script>alert('密码错误');location.href='/'</script>";
			}
		}else{
			echo "<script>alert('用户名错误');location.href='/'</script>";
		}
	}



}