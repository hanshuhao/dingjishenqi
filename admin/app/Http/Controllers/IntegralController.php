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
class IntegralController extends BaseController
{
	public function integral()
	{      
		$arr = DB::table('integral')->get();
		return view("integral.integral",['arr'=>$arr]);
	}
    //修改页面
    public function  integralUpdate(){
    	$arr = Request::input();
    	$res = DB::table('integral')->where("id","=",$arr['id'])->first();
    	return view("integral.integralUpdate",['res'=>$res]);
    }
    //修改单条,
    public function  integralUpdate_do(){
    	$arr = Request::input();
    	$res = DB::table('integral')->where("id","=",$arr['id'])->update($arr);
    	return redirect('integral');
    }
    //修改名称
     public function  type(){
    	$arr = Request::input();
    	$res = DB::table('integral')->where("id","=",$arr['pid'])->update(['type'=>$arr['type']]);
    	return $res;
    }
    //修改最小值
     public function  min(){
    	$arr = Request::input();
    	$res = DB::table('integral')->where("id","=",$arr['pid'])->update(['min'=>$arr['min']]);
    	return $res;
    }
    //修改最大值
     public function  max(){
    	$arr = Request::input();
    	$res = DB::table('integral')->where("id","=",$arr['pid'])->update(['max'=>$arr['max']]);
    	return $res;
    }

    /**
     * 增加
     */
    public function add(){
    	$arr=array();
        $id = DB::table('integral')->insertGetId(['type'=>"请点击修改","min"=>"请点击修改","max"=>"请点击修改","level"=>"请点击修改"]);
        return $id;
    }
}