<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UsersController extends Controller
{
    //
    public function index()
    {
    $users = [ '0' => [
	'first_name'=> 'Manjusha',
	'last_name'=> 's',
	 'company'=>'compassites'],
	 '1' =>[ 'first_name'=>'pratheeksha', 'last_name'=>'s','company'=>'school']];
	//return $users;
	 return view('admin.users.index',compact('users'));
    }

    public function create()
    {
    	return 'create';
    }
}
