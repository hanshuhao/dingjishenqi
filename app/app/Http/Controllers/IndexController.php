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
         $a=explode(',',$arr['cnum']);
         $b=explode(',',$arr['vnum']);
         $a=count($a);
         $b=count($b);
         $c=$a+$b-2;
         $arr['c']=$c;
         $arr['username'] = Session::get('uname');
         return view('index/select',$arr);
     }
     /*
      * 提交订单页面
      */
     public function select_do(){
         $id=Request::input('id');
         $arr=DB::table('internet_bar')->where('id',$id)->first();
         return view('index.select_do',['list'=>$arr]);
     }
     /*
      * 结算价格
      * */
     public function money(){
         $arr=Request::input();
         //查询网吧价格
         $date=DB::table('price')->where('iid',$arr['id'])->first();
         if($arr['radio']==1){
             $vip=$date['vip'];
             $money=$arr['times']*$vip;
             return $money;
         }else{
             $ordinary=$date['ordinary'];
             $money=$arr['times']*$ordinary;
             return $money;
         }
     }

     /*
      * 付账，生成订单
      * */
     public function account(){
         $arr=Request::input();
         unset($arr["_token"]);
         $id=Session::get('uid');
         $str=DB::table('users')->where('loginid',$id)->first();
         if(!$str)
         {
            $message="请先完善个人信息";
            $time="2";
            $contro="/";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
         }
         $date['c_num']=$this->a($arr['id'],$arr['radio']);
         //判断机器号
         if($date['c_num'] ==0)
         {
            $message="没有空机器";
            $time="2";
            $contro="/";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
         }
         $date['username']=$str['uname'];
         $date['IDcard']=$str['IDcard'];
         $on="KF_".time('H-i-s').rand(1000,9999);
         $date['l_num']=$on;
         $date['on_time']=time();
         $date['down_time']=time()+3600*$arr['times'];
         $date['money']=$arr['money'];
         $date['iid']=$arr['id'];
         $date['loginid']=Session::get('uid');
         $date['loginid']=$id;
         $data=DB::table('invoice')->insert($date);
         if($data){
            $message="操作成功";
            
        }else{
            $message="提交失败";
        }
        $time="2";
        $contro="/";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
     }

     /**
      * [a 生成机器号]
      * @param  [int] $iid [网吧id]
      * @param  [int] $type [机器类型]
      * @return [int]      [机器号]
      */
        public function a($iid,$type){
            //查询网吧剩余机器
            if($type == 2)
            {
                $data = DB::table('internet_bar')->select('cnum')->where('id',$iid)->first();
                $arr = explode(',', $data['cnum']);
                $cnum = array_pop($arr);
            }
            else
            {
                $data = DB::table('internet_bar')->select('vnum')->where('id',$iid)->first();
                $arr = explode(',', $data['vnum']);
                $vnum = array_pop($arr);
            }
            // var_dump($arr);die;
            //判断是否有空余机器
            if(!$arr)
            {
                return 0;
            }
            else
            {   
                $arrs=array_shift($arr);
                if($type == 2)
                {
                    $arr[] = $cnum;
                    $date['cnum'] = implode(',', $arr);
                }
                else
                {
                    $arr[] = $vnum;
                    $date['vnum'] = implode(',', $arr);
                }
                //修改数据库信息
                DB::table('internet_bar')->where('id',$iid)->update($date);
                return $arrs;
            }
                
        }

        /**
         * [xiaji 网吧下机]
         * @return [type] [description]
         */
        public function xiaji()
        {
            $id = $_GET['id'];
            $res = DB::table('invoice')->where('id',$id)->update(['status'=>1]);
            if($res){
                $contro="indent";
            }else{
                $contro="indent";
            }
            $message="下机成功";
            $time="2";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
            
        }
}