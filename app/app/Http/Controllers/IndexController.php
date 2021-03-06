<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Response;
use Request;
use Cookie;
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
        header("Content-Type:text/html;charset=utf-8");
        $id=Request::input('id');
        if(isset($id)){
            //解密
            $id=base64_decode($id);
            $id=substr($id,0,-4);
            $id=substr($id,-1,4);
            Session::put("invite",$id);
            //查询网吧信息
            $data = DB::table('internet_bar')->get();
            return  view("index.index",['data'=>$data]);
        }else{
            //查询网吧信息
            $data = DB::table('internet_bar')->get();
            return  view("index.index",['data'=>$data]);
        }
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
         Session::put('iid',$id);
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
      * [account 付账，生成订单]
      * 订单号   "K_".$id,
      * 存入价格 "M_".$id
      * 网吧iid  "I_".$id
      * 机器类型 "T_".$id
      * 机器号 "C_".$id
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
        //接受折扣
        $discount = 1-Session::get("discount");
        $date['username']=$str['uname'];
        $date['IDcard']=$str['IDcard'];
        $on="KF_".time('H-i-s').rand(1000,9999);
        $date['l_num']=$on;
        $date['on_time']=time();
        $date['down_time']=time()+3600*$arr['times'];
        //算出折扣后的金钱
        $date['money']=sprintf('%.2f',$arr['money']*$discount);
        //print_r($date);die;
        $date['iid']=$arr['id'];
        $date['loginid']=Session::get('uid');
        $date['loginid']=$id;
        $date['dtime']=time()+180;
        $id=Session::get('uid');
        $data=DB::table('invoice')->insert($date);
        if($date){
             Session::put("K_".$id,$on);
             Session::put("I_".$id,$arr['id']);
             Session::put("C_".$id,$date['c_num']);
             Session::put("T_".$id,$arr['radio']);
             Session::put("M_".$id,$date['money']);
             return  Redirect('pay');
        }else{
            $message="提交失败";
            $time="2";
            $contro="/";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
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

        /**
          * [pay 支付宝接口]
          */
        
        public function pay()
        {     
                header("content-type:text/html;charset=utf8");
                $id= Session::get("uid");
                $money= Session::get("M_".$id);
                $num  = Session::get("K_".$id);
                     
                // ******************************************************配置 start*************************************************************************************************************************
                //↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                //合作身份者id，以2088开头的16位纯数字
                $alipay_config['partner'] = '2088002075883504';
                //收款支付宝账号
                $alipay_config['seller_email'] = 'li1209@126.com';
                //安全检验码，以数字和字母组成的32位字符
                $alipay_config['key'] = 'y8z1t3vey08bgkzlw78u9cbc4pizy2sj';
                //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
                //签名方式 不需修改
                $alipay_config['sign_type'] = strtoupper('MD5');
                //字符编码格式 目前支持 gbk 或 utf-8
                //$alipay_config['input_charset']= strtolower('utf-8');
                //ca证书路径地址，用于curl中ssl校验
                //请保证cacert.pem文件在当前文件夹目录中
                $alipay_config['cacert'] = getcwd() . '\\cacert.pem';
                //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
                $alipay_config['transport'] = 'http';
                // ******************************************************配置 end*************************************************************************************************************************

                // ******************************************************请求参数拼接 start*************************************************************************************************************************
                $parameter = array(
                        "service" => "create_direct_pay_by_user",
                        "partner" => $alipay_config['partner'], // 合作身份者id
                        "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
                        "payment_type" => '1', // 支付类型
                        "notify_url" => "http://www.app.com/index.php/notify_url", // 服务器异步通知页面路径
                        "return_url" => "http://www.app.com/index.php/return_url", // 页面跳转同步通知页面路径
                        "out_trade_no" => $num, // 商户网站订单系统中唯一订单号
                        "subject" => "订单", // 订单名称
                        "total_fee" =>$money, // 付款金额
                        "body" => "", // 订单描述 可选
                        "show_url" => "", // 商品展示地址 可选
                        "anti_phishing_key" => "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
                        "exter_invoke_ip" => "", // 客户端的IP地址
                        "_input_charset" => 'utf-8', // 字符编码格式
                );
                // 去除值为空的参数
                foreach ($parameter as $k => $v) {
                    if (empty($v)) {
                        unset($parameter[$k]);
                    }
                }
                // 参数排序
                ksort($parameter);
                reset($parameter);

                // 拼接获得sign
                $str = "";
                foreach ($parameter as $k => $v) {
                    if (empty($str)) {
                        $str .= $k . "=" . $v;
                    } else {
                        $str .= "&" . $k . "=" . $v;
                    }
                }
                $parameter['sign'] = md5($str . $alipay_config['key']);
                $parameter['sign_type'] = $alipay_config['sign_type'];
                // ******************************************************请求参数拼接 end*************************************************************************************************************************


                // ******************************************************模拟请求 start*************************************************************************************************************************
                $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
                foreach ($parameter as $k => $v) {
                    $sHtml .= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
                }

                $sHtml = $sHtml . "<script>document.forms['alipaysubmit'].submit();</script>";

                // ******************************************************模拟请求 end*************************************************************************************************************************

                echo $sHtml;

        }
         /**
          * [notify_url 支付失败]
          * @return [type] [description]
          */
        public function notify_url(){
                $id= Session::get("uid");
                $iid  = Session::get("I_".$id);
                $num  = Session::get("K_".$id);
                $cnum  = Session::get("C_".$id);
                $type  = Session::get("T_".$id);
                //查询空置机器
                if($type == 2)
                {
                    $arr = DB::table('internet_bar')->select('cnum')->where('id',$iid)->first();
                    $data['cnum'] = $cnum.','.$arr['cnum'];
                }
                else
                {
                    $arr = DB::table('internet_bar')->select('vnum')->where('id',$iid)->first();
                    $data['vnum'] = $cnum.','.$arr['vnum'];
                }
                $res =  DB::table('invoice')->where('l_num', $num)->update(['status' => -1]);

                $re =  DB::table('internet_bar')->where('id', $iid)->update($data);
                if($res){

                Session::forget("K_".$id);
                Session::forget("I_".$id);
                Session::forget("M_".$id);
                Session::forget("C_".$id);
                Session::forget("T_".$id);
                $message="支付失败";
                $time="2";
                $contro="user/list";
                return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
            }
        }
        /**
         * [return_url 支付成功]
         * @return [type] [description]
         */
        public function return_url(){
                $id= Session::get("uid");
                $num  = Session::get("K_".$id);
                $res =  DB::table('invoice')->where('l_num', $num)->update(['status' => 0]);
                $integral = ceil(Session::get('M_'.$id));
                DB::table("users")->where("id",$id)->increment('integral',$integral);
                if($res){
                //删除session
                Session::forget("K_".$id);
                Session::forget("I_".$id);
                Session::forget("M_".$id);
                Session::forget("C_".$id);
                Session::forget("T_".$id);
                $message="支付成功";
                $time="2";
                $contro="user/list";
                return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
            }
        }

        /**
         * [comment 发布评论]
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        public function comment(Request $request)
        { 
          $data['content'] = Request::input('content');
          $data['uid'] = Session::get('uid');
          $data['iid'] = Request::input('iid');
          $data['c_time'] = date("Y-m-d H:i:s",time());
          if($data['content']==""){
            return -1;
          }else{
            $res = DB::table("comment")->insert($data);
            if($res){
              return 1;
            }else{
              return 0;
            }
          }
          
        }

      /**
       * [comment_show 评论显示页面]
       * @return [type] [description]
       */
        public function comment_show()
        {
          $iid = Session::get('iid');
          $arr = DB::table("internet_bar")->where("id",$iid)->first();
          $data['comment'] = DB::table("comment")->join('login','comment.uid','=','login.id')->join('internet_bar','comment.iid','=','internet_bar.id')->get();
          //print_r($data);die;
          return view('index.comment',$arr,$data);
        }

        /**
         * [comment_del 评论删除]
         * @return [type] [description]
         */
        public function comment_del()
        {
          $cid = $_GET['cid'];
          $res = DB::table("comment")->where("cid",$cid)->delete();
          if($res)
          { 
            return 1;
          }else{
            return 0;
          }
        }

        /**
         * [dianzan 点赞处理]
         * @return [type] [description]
         */
        public function dianzan()
        {
          $iid = $_GET['iid'];
          $uid = Session::get("uid");
          $data['zan_name'] = $uid.$iid;
          $data['zan_time'] = date("Y-m-d",time());

          $ress = DB::table("dianzan")->where("zan_name",$data["zan_name"])->first();
          if($ress){
            if($data['zan_time']-$ress['zan_time']>=1){
              DB::table("dianzan")->where("zan_name",$data["zan_name"])->update(["zan_time"=>$data["zan_time"]]);
              $res = DB::table("internet_bar")->where("id",$iid)->increment('zan',1);
              if($res)
              {
                return 1;
              }
              else
              {
                return 0;
              }
            }else{
              return -1;//-1是一天只能赞一次
            }
          }else{
            DB::table("dianzan")->insert($data);
            $resss = DB::table("internet_bar")->where("id",$iid)->increment('zan',1);
            if($resss)
              {
                return 1;
              }
              else
              {
                return 0;
              }
          }
          
        }


        public function comment_huifu()
        {
          $ccid = $_GET['ccid'];
          $arr = DB::table("comment")->where("ccid",$ccid)->get();
          $username = $_GET['username'];
          $iname = $_GET['iname'];
          $str = "";
          //print_r($arr);die;
          if($arr){
            foreach ($arr as $key => $v) {
              $str = "<h5>".$iname.":</h5>";
              $str = $str.$v['content']."&nbsp;&nbsp;&nbsp;&nbsp;";
              $str = $str."(".$username.")<br/>";
            }
            return $str;
          }else{
            return 0;
          }
        }
}