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
        $date=DB::table('internet_bar')->where('loginid',Session::get('uid'))->first();
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
            echo '<script>alert("修改成功!");location.href="/";</script>';
        }else{
            echo '<script>alert("修改失败!");location.href="uplodes";</script>';
        }
    }
}
