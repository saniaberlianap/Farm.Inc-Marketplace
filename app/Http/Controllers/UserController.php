<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    function store(Request $request){
        if ($request->password != $request->cpassword) {
    		\Session::flash('error', 'Password tidak sama !');

    		return redirect('register');
    	}

    	$data = [
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' =>\Hash::make($request->password) 
    	];

    	\App\User::create($data);
    	\Session::flash('msg', 'Berhasil');
    	return redirect('login');
    }


    function login(Request $request){
    $user = User::where('email', $request->email)->first();

    if($user == null){
        \Session::flash('error', 'Email tidak terdaftar');
            return redirect('/login');
    }
  
        if(\Hash::check($request->password, $user->password)){
            \Session::put('user', $user);
            return redirect('/dashboard');
        }else{
            \Session::flash('error', 'Email atau Password tidak cocok');
            return redirect('/login');
        }
    
}

function logout(){
    \Session::flush();

    return redirect('/');
}




}
