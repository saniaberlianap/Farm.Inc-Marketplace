<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jual;

use App\Produk;

use App\Pengguna;

class JualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataJual = Jual::when($request->search, function($query) use($request){
        })->join('pengguna', 'id_pengguna', '=', 'jual.pengguna_id')->orderBy('id_jual', 'asc')
        ->join('produk', 'id_produk', '=', 'jual.produk_id')->orderBy('id_jual', 'asc')->paginate(10);

         $pengguna = Pengguna::all();
         $produk = Produk::all();
         $user = \Session::get('user');

        return view('jual.index', compact('dataJual','pengguna', 'produk', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_jual)
    {
        Jual::whereId_jual($id_jual)->delete();
        return redirect()->route('jual.index')->with('success', 'Data is successfully deleted ');
    }
}
