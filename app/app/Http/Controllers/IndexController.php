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


 class IndexController extends Controller
{   
	/**
	 * [index 首页]
	 */
    public function  index(){
    	//查询网吧信息
    	$data = DB::table('internet_bar')->get();
       return  view("index.index",['data'=>$data]);
    }

    /*
      * 选择网吧
      * */
     public function select(){
         $arr = DB::table('login')->where('id',Session::get('uid'))->first();
         $id=Request::input('id');
         $arr=DB::table("internet_bar")->where("id",$id)->first();
         $arr['username'] = Session::get('uname');
         $num=$this->a();
         $arr['num']=count($num);
         return view('index/select',$arr);
     }

     /*
      * 结算价格
      * */
     public function money(){
         $arr=Request::input();
         //查询网吧价格
         $date=DB::table('price')->where('lid',$arr['id'])->get();
         if($arr['radio']==1){
             $vip=$date[0]['vip'];
             $money=$arr['times']*$vip;
             echo $money;
         }else{
             $ordinary=$date[0]['ordinary'];
             $money=$arr['times']*$ordinary;
             echo $money;
         }
     }


     /*
      * 付账，生成订单
      * */
     public function account(){
         $arr=Request::input();
         unset($arr["_token"]);
         //$id=Session::get('uid');
         $id=11;
         $str=DB::table('users')->where('loginid',$id)->first();
         $date['username']=$str['uname'];
         $date['IDcard']=$str['IDcard'];
         $on="KF_".time('H-i-s').rand(1000,9999);
         $date['l_num']=$on;
         $date['on_time']=time();
         $date['down_time']=time()+3600*$arr['times'];
         $date['c_num']=$this->a();
         $date['money']=$arr['money'];
         $date['iid']=$arr['id'];
         $date['loginid']=Session::get('uid');
         $data=DB::table('invoice')->insert($date);
         if($data){
             echo '<script>alert("提交成功!");location.href="select";</script>';
         }else{
             echo '<script>alert("提交失败!");location.href="select";</script>';
         }
     }

     /*
      * 网吧机器编号
      * */
        public function a(){
           $arr=array(
                1,2,3,4,5,6,7,8,9,10
            );
            $arrs=array_shift($arr);
            return $arrs;
        }
}