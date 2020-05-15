<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produk;

use App\Pengguna;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataProduk = Produk::when($request->search, function($query) use($request){
            $query->where('nama_produk', 'LIKE', '%'.$request->search.'%')
            ->orWhere('kategori', 'LIKE', '%'.$request->search.'%')
            ->orWhere('deskripsi', 'LIKE', '%'.$request->search.'%')
            ->orWhere('harga', 'LIKE', '%'.$request->search.'%');
        })->join('pengguna', 'id_pengguna', '=', 'produk.pengguna_id')->orderBy('id_produk', 'asc')->paginate(10);

         $pengguna = Pengguna::all();

         $user = \Session::get('user');

        return view('produk.index', compact('dataProduk', 'pengguna', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pengguna = Pengguna::all()->sortBy('nama');

        $user = \Session::get('user');

        return view('produk.create', compact('pengguna', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'pengguna_id' => 'required',
            'image' => 'required'
        ]);

        // $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nama_produk'    =>  $request->nama_produk,
            'kategori'    =>  $request->kategori,
            'deskripsi'     =>  $request->deskripsi,
            'harga'     =>  $request->harga,
            'pengguna_id'       =>  $request->pengguna_id,
            'image'         =>  $request->image
        );

        Produk::create($form_data);

         return redirect()->route('produk.index')->with('success', 'Data Added Successfully.');
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
    public function edit($id_produk)
    {
         $pengguna = Pengguna::all()->sortBy('nama');

         $user = \Session::get('user');

        $dataProduk = Produk::findOrFail($id_produk);
        return view('produk.edit', compact('dataProduk', 'user'))->with('pengguna', $pengguna);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'pengguna_id' => 'required',
            'image' => 'required'
        ]);


        $dataProduk = Produk::find($id_produk);
        $dataProduk->update($request->all());
       return redirect()->route('produk.index')->with('success', 'Data is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_produk)
    {
        Produk::whereId_produk($id_produk)->delete();
        return redirect()->route('produk.index')->with('success', 'Data is successfully deleted ');
    }
}
