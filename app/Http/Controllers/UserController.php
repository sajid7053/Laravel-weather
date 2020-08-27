<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller {
	public function store(request $request){
	  $name = $request->input('name');
	  $email = $request->input('email');
	  $password = $request->input('password');
	  $insert = DB::insert('insert into users(id,name,email,password) values(?,?,?,?)',[null,$name,$email,$password]);
      if($insert){
        echo "Successfully registered";
      }
	}
    
    public function logs(request $request){
    	$email = $request->input('email');
    	$password = $request->input('password');
    	$data = DB::select('select id from users where email =? and password =?',[$email,$password]);
    	if(count($data)){
    		return redirect('/success');
    	}
    	else {
    		echo " wrong details";
    	}
    }
	public function dashboard(){
		return view('dashboard');
		if(isset($_POST['submit_btn'])){
			return redirect('/weather_info');
		}
	}
    public function weather(request $request){
    	$date = $request->input('date1');
	    $jsonfile = file_get_contents("https://www.metaweather.com/api/location/2295420/$date");
	    $jsondata = json_decode($jsonfile);
        return $jsondata;
    }

}