<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\laravel;
use Illuminate\Support\Facades\Input;
use DB;
use App\Quotation;
use App\Practice;

class users_controller extends Controller
{
    public function create()
    {
        try {
            return view("welcome");
        //return view("test@store")
        } catch (\Exception  $e) {
            echo $e->getMessage();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $this->validate($request, [
                                  'name'=>'required|min:2|max:40|alpha',
                                  'email'=>'required|min:11|max:255|email',
                                  'password'=>'required',
                                  'mobile'=>'required|min:10|max:15',
                                  'gender'=>'required',
                                  'interests'=>'required',
                                  'city'=>'required',
                                  'location_priority'=>'required'],
                                 ['name.min'=>'name must be atleast 2 character',
                                  'name.max'=>'name must not exceed 40 chars']);
        $interestsAsString = '';
        foreach($request->interests as $interests) {
            $interestsAsString .= $interests . ",";
        } 
        $location_priority = '';
        foreach($request->location_priority as $locPrio) {
            $location_priority .= $locPrio . ",";
        }
        
        try {                          
            $user = new Practice;
            $user->name = Input::get("name");
            $user->email = Input::get("email");
            $user->password = Input::get("password");
            $user->mobile = Input::get("mobile");
            $user->gender = Input::get("gender");
            $user->interests = rtrim($interestsAsString, ',');
            $user->city = Input::get("city");
            $user->location_priority =  rtrim($location_priority, ',');
            $user->save();
            return redirect('/');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {  
        try {
            $data['data'] = DB::table('laravels')->get();
            if (count($data) > 0) {
                return view('admin.users.view',$data);
            } else {
                return view("welcome");   
            }  
        } catch (\Exception $e) {
            echo $e->getMessage();
        }    //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        try {
            $value = Practice::find($id);
            return view('admin.users.update')->with('value',$value);
        } catch (\Exception $e) {
            echo $e->getMessage();    
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                                  'name'=>'required|min:2|max:40|alpha',
                                  'email'=>'required|min:11|max:255|email',
                                  'password'=>'required',  
                                  'mobile'=>'required|min:10|max:15',                              
                                  'gender'=>'required',
                                  'interests'=>'required',
                                  'city'=>'required',
                                  'location_priority'=>'required'],
                                 ['name.min'=>'name must be atleast 2 character',
                                  'name.max'=>'name must not exceed 40 chars']);

        try {            
            $interestsAsString = '';
            foreach($request->interests as $interests) {
                $interestsAsString .= $interests . ",";
            }    
            $location_priority = '';
            foreach($request->location_priority as $locPrio) {
            $location_priority .= $locPrio . ",";
            }
            $user = Practice::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->interests = rtrim($interestsAsString, ',');
            $user->city = $request->city;
            $user->location_priority =  rtrim($location_priority, ',');
            $user->update();
            return redirect('/')->with('message','Record Updated Successfully..!');
        //
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {   
        try {
            DB::table('laravels')->where('id',$id)->delete();
            return redirect('/')->with('message','Record deleted successfully..!');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }
}
