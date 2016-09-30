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
       return  view("index.index");
    }


}