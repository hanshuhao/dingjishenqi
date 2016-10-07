<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Session,DB;

class MerchantController extends BaseController
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
            $mimeTye = $file->getMimeType();
            $newName = date('ymdhis' . rand(1000,9999)) . "." . $entension;
            $path = $file->move('uploads/merchant', $newName);
            $arr['log'] = $path;
            $arr['status']='0';
            $arr['loginid']=$id;
        }
        //入库
        $str=DB::table('internet_bar')->insert($arr);
        if($str){
            echo '<script>alert("申请成功!");location.href="/";</script>';
        }else{
            echo '<script>alert("申请失败!");location.href="news";</script>';
        }
    }

    /*
     * 商店信息修改
     * */
    public function uplodes(){
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->get();
        return view('merchant.uplodes',['list'=>$date]);
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
                $entension = $file->getClientOriginalExtension(); //上传文件的后缀.
                $mimeTye = $file->getMimeType();
                $newName = date('ymdhis' . rand(1000, 9999)) . "." . $entension;
                $path = $file->move('uploads/merchant', $newName);
                $arr['log'] = $path;
                $arr['loginid'] = $ids;
            }
        }
        //修改
        $str=DB::table('internet_bar')->where('id',$id)->update($arr);
        if($str){
            echo '<script>alert("修改成功!");location.href="merchant";</script>';
        }else{
            echo '<script>alert("修改失败!");location.href="uplodes";</script>';
        }
    }


    /*
      *查询订单
      */
    public function indent(){
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->first();
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
        $arr=Request::input();
        unset($arr['_token']);
        unset($arr['id']);
        $str=DB::table('price')->where('id',$id)->update($arr);
        if($str){
            echo '<script>alert("修改成功!");location.href="merchant";</script>';
        }else{
            echo '<script>alert("修改失败!");location.href="merchant";</script>';
        }
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
            echo "请输入数字";die;
        }
        $id=Session::get('uid');
        $date=DB::table('internet_bar')->where('loginid',$id)->first();
        $arr['vip']=$vip;
        $arr['ordinary']=$ordinary;
        $arr['iid']=$date['id'];
        $str=DB::table('price')->insert($arr);
        if($str){
            echo '<script>alert("添加成功!");location.href="merchant";</script>';
        }else{
            echo '<script>alert("添加失败!");location.href="merchant";</script>';
        }
    }

}
