<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Session,DB;

class MerchantController extends Controller
{
    /*
     * 商户中心
     * */
    public function index(){
        //$arr = DB::table('login')->where('id',Session::get('uid'))->first();
        $date=DB::table('internet_bar')->where('loginid',Session::get('uid'))->first();
        $data['username'] = Session::get('uname');
        if(!$date){
            $date['status']='9';
        }
        return view('merchant.index',$date);
    }

    /*
     * 商家信息填写
     * */
    public function news(){
        return view('merchant.news');
    }

    /*
     * 信息入库
     * */
    public function add(Request $request)
    {
        $arr=Request::input();
        $id=Session::get('uid');
        unset($arr['_token']);
        $file = Request::file('log');
        //文件上传

        if ($file->isValid()) {
            //检验一下上传的文件是否有效.
            $clientName = $file->getClientOriginalName();
            //这个表示的是缓存在tmp文件夹下的文件的绝对路径
            $entension = $file->getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('ymdhis' . rand(1000,9999)) . "." . $entension;
            $path = $file->move('uploads/merchant', $newName);
            $arr['log'] = $path;
            $arr['status']='0';
            $arr['loginid']=$id;
        }
        //入库
        $str=DB::table('internet_bar')->insert($arr);
        if($str){
            $message="成功提交";
        }else{
            $message="申请失败";
        }
        $time="2";
        $contro="merchant";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
    }

    /*
     * 商店信息修改
     * */
    public function uplodes(){
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->first();
        $cnum = explode(',',$date['cnum']);
        $vnum = explode(',',$date['vnum']);
        $date['cnum'] = array_pop($cnum);
        $date['vnum'] = array_pop($vnum);
        return view('merchant.uplodes',$date);
    }

    /**
     * [addNum 生成空余机器]
     */
    public function addNum()
    {
        //查询网吧机器信息
        $data = DB::table('internet_bar')->select('id','cnum','vnum')->where('loginid',session::get('uid'))->first();
        $cnum = explode(',', $data['cnum']);
        $vnum = explode(',', $data['vnum']);
        $date['cnum'] = array_pop($cnum);
        $date['vnum'] = array_pop($vnum);
        $date['cnums'] = $cnum;
        $date['vnums'] = $vnum;
        $date['iid'] = $data['id'];
        return view('merchant/addNum',$date);
    }

    /**
     * [numadd 空余机器添加]
     */
    public function numadd()
    {
        $cnum = isset($_POST['cnum'])?$_POST['cnum']:array();
        $vnum = isset($_POST['vnum'])?$_POST['vnum']:array();
        $cnums = $_POST['cnums'];
        $vnums = $_POST['vnums'];
        $cnum_do = implode(",",$cnum);
        $vnum_do = implode(",",$vnum);
        $cnum_do_do = $cnum_do.",".$cnums;
        $vnum_do_do = $vnum_do.",".$vnums;
        $iid = $_POST['iid'];
        $res = DB::table("internet_bar")->where('id',$iid)->update(array('cnum'=>$cnum_do_do,'vnum'=>$vnum_do_do));
        if($res){
            $message="修改成功";
        }else{
            $message="修改失败";
        }
        $time="2";
        $contro="addNum";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
    }


    /*
     * 执行修改
     * */
    public function uplodes_do(){
        $arr=Request::input();
        $id=$arr['id'];
        $ids=Session::get('uid');
        unset($arr['_token']);
        $file = Request::file('log');
        //判断是否有文件上传
        if($file) {
            if ($file->isValid()) {
                //检验一下上传的文件是否有效.
                $clientName = $file->getClientOriginalName();
                //这个表示的是缓存在tmp文件夹下的文件的绝对路径
                $entension = $file->getClientOriginalExtension(); //上传文件的后缀
                $newName = date('ymdhis' . rand(1000, 9999)) . "." . $entension;
                $path = $file->move('uploads/merchant', $newName);
                $arr['log'] = $path;
                $arr['loginid'] = $ids;
            }
        }
        //修改
        $str=DB::table('internet_bar')->where('id',$id)->update($arr);
        if($str){
            $message="修改成功";
        }else{
            $message="修改失败";
        }
        $time="2";
        $contro="merchant";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);

    }


    /*
      *查询订单
      */
    public function indent(){
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->first();
        $str1=DB::table('invoice')->where('iid',$date['id'])->get();
        $time = time();
        $id = "";
        foreach ($str1 as $key => $value) {
            if( $value['down_time'] < $time){
                $id .= $value['id'].",";
            }
        }   
        $i_id = substr($id,0,strlen($id)-1);
        $iid = explode(',', $i_id);
        foreach ($iid as $key => $value) {
            DB::table('invoice')->where("id",$value)->update(['status'=>1]);
        }
        $str=DB::table('invoice')->where('iid',$date['id'])->get();
        return view('merchant.indent',['str'=>$str]);
    }

    /*
     * 添加网吧价格页面
     */
    public function price(){
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->first();
        $str=DB::table('price')->where('iid',$date['id'])->first();
        return view('merchant.price',['list'=>$str]);
    }

    /*
     * 网吧价格修改页面
     */
    public function prupdates(){
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->first();
        $str=DB::table('price')->where('iid',$date['id'])->first();
        return view('merchant.prupdates',$str);
    }

    /*
     * 网吧价格修改
     */
    public function pruplist(){
        $id=Request::input('id');
        $vip=Request::input('vip');
        $ordinary=Request::input('ordinary');
        if(!is_numeric($vip)||!is_numeric($ordinary)){
            $message='请输入正确价格';
            $time="2";
            $contro="prupdates";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
        $arr['vip']=$vip;
        $arr['ordinary']=$ordinary;
        $str=DB::table('price')->where('id',$id)->update($arr);
        if($str){
            $message="修改成功";
        }else{
            $message="修改失败";
        }
        $time="2";
        $contro="prupdates";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
    }

    /*
     * 首次录入价格
     */
    public function pricelist(){
        return view('merchant.pricelist');
    }

    /*
     * 网吧价格入库
     */
    public function price_do(){
        $vip=Request::input('vip');
        $ordinary=Request::input('ordinary');
        if(!is_numeric($vip)||!is_numeric($ordinary)){
            $message='请输入正确价格';
            $time="2";
            $contro="prupdates";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->first();
        $arr['vip']=$vip;
        $arr['ordinary']=$ordinary;
        $arr['iid']=$date['id'];
        $str=DB::table('price')->insert($arr);
        if($str){
            $message="添加成功";
        }else{
            $message="添加失败";
        }
        $time="2";
        $contro="prupdates";
        return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
    }

}
