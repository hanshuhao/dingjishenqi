<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
class Webs
{  


    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function __construct(Guard $auth){
          $this->auth = $auth;
    }
     
    public function handle($request, Closure $next)
    {  
        $user = Session::get('uname');
        if ($user) {
           return $next($request);
        }else{
            // return "<script>alert('请先登录');location.href='welcome'</script>";
            $message="亲，你还未登录哦";
            $time="4";
            $contro="/welcome";
            return view('login.errors',['message'=>$message,'time'=>$time,'contro'=>$contro]);
        }

       
    }
}
