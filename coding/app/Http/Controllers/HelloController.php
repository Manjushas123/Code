<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
    	return "hello world";
     return view('hello.index',compact('hello'));
    }
}
