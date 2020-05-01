<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produk;

use App\Kategori;

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
            ->orWhere('deskripsi', 'LIKE', '%'.$request->search.'%')
            ->orWhere('harga', 'LIKE', '%'.$request->search.'%')
            ->orWhere('jenis', 'LIKE', '%'.$request->search.'%');
        })->join('kategori', 'id_kategori', '=', 'produk.kategori_id')->orderBy('id_produk', 'asc')->paginate(10);

         $kategori = Kategori::all();

         $user = \Session::get('user');

        return view('produk.index', compact('dataProduk', 'kategori', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all()->sortBy('jenis');

        return view('produk.create', compact('kategori'));
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
            'deskripsi' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nama_produk'    =>  $request->nama_produk,
            'deskripsi'     =>  $request->deskripsi,
            'harga'     =>  $request->harga,
            'kategori_id'       =>  $request->kategori_id,
            'image'         =>  $new_name
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
         $kategori = Kategori::all()->sortBy('jenis');

        $dataProduk = Produk::findOrFail($id_produk);
        return view('produk.edit', compact('dataProduk'))->with('kategori', $kategori);
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
        $dataProduk = Produk::find($id_produk);
        $dataProduk->update($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $dataProduk->image = $request->file('image')->getClientOriginalName();
            $dataProduk->save();
        }
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
