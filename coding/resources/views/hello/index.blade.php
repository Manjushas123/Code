<?php
namespace App\Http\Controllers;
use Illuminate\Httpp\Request;
use App\Http\Requests;
class HelloController extends Controller
{
	public function index() {
		return view('hello.index');
	}
}
