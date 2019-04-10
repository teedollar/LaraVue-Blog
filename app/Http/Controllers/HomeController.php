<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class HomeController extends Controller
{
	public function mail()
	{
	   $name = 'Adetayo Saheed';
	   Mail::to('olagunjuadetayor@gmail.com')->send(new SendMailable($name));
	   
	   return 'Email was sent successfully';
	}
}
