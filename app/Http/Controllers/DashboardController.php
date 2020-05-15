<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produk;
use App\Pengguna;

class DashboardController extends Controller
{
    
	public function index(){
        $produk = Produk::all()->count();
        $pengguna = Pengguna::all()->count();
       
        $user = \Session::get('user');

        
        return view('dashboard', compact('produk', 'pengguna', 'user'));
    }

}
