<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;


class LoginController extends Controller
{
	public function index(){
        return view('login');
	}
}