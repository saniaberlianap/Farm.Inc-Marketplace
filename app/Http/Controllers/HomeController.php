<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function register(){

    	return view('register');
    }

    function login(){

    	return view('login');
    }

    function dashboard(){
        $user = \Session::get('user');
    
        return view('dashboard', compact('user'));
    }

   

}
