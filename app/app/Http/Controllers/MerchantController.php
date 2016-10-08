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
                $entension = $file->getClientOriginalExtension(); //上传文件的后缀
                //$mimeTye = $file->getMimeType();
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
        return view('merchant/addNum',$date);
    }

    /**
     * [numAdd 添加空余的机器入库]
     * @return [type] [description]
     */
    public function numAdd()
    {
        //获取信息
        $arr=Request::input();
        //设置添加信息
        //普通区
        if(isset($arr['cnum']))
        {
            $cnum = $arr['cnum'];
            $cnum[] = $arr['cnums'];
        }
        else
        {
            $cnum[] = $arr['cnums'];
        }
        //VIP区
        if(isset($arr['vnum']))
        {
            $vnum = $arr['vnum'];
            $vnum[] = $arr['vnums'];
        }
        else
        {
            $vnum[] = $arr['vnums'];
        }
        $data['cnum'] = implode(',', $cnum);
        $data['vnum'] = implode(',', $vnum);
        //修改数据库信息
        $res = DB::table('internet_bar')->where('loginid',session::get('uid'))->update($data);
        if($res)
        {
            return redirect('addNum');
        }
        else
        {
            echo '0';
        }
    }
}
