<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "users_controller@show");
/*Route::get('users',function() {
	$users = [
	'first_name'=> 'Manjusha',
	'last_name'=> 's',
	 'company'=>'compassites'];
	return $users;
});*/
Route::get("show","users_controller@show");
Route::get("create","users_controller@create");
Route::post("store","users_controller@store");
Route::get('/delete/{id}','users_controller@delete');
Route::get('/edit/{id}','users_controller@edit');
Route::post('/update/{id}','users_controller@update');
Auth::routes();
Route::get('/home', 'HomeController@index');

