<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kategori;

use App\Models\User;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index(Request $request)
    {
        $user = \Session::get('user');
        
        $search = $request->get('search');
        $dataKategori = Kategori::where('jenis','like', '%'.$search.'%')->paginate(5);
        return view('kategori.index', compact('dataKategori', 'user'));
       

        $dataKategori = Kategori::latest()->paginate(5);
        return view('kategori.index', compact('dataKategori'))->with('i', (request()->input('page', 1) - 1) * 5 );

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'jenis' => 'required',
        ]);

      
        $form_data = array(
            'jenis'    =>  $request->jenis,
        );

        Kategori::create($form_data);

        return redirect()->route('kategori.index')->with('success', 'Data Added Successfully.');
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
    public function edit($id_kategori)
    {
        $dataKategori = Kategori::find($id_kategori);

        return view('kategori.edit', compact('dataKategori'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'jenis' => 'required',
        ]);

        $dataKategori = Kategori::find($id_kategori);
        $dataKategori->jenis = $request->input('jenis');
        $dataKategori->save();
        return redirect()->route('kategori.index')->with('success', 'Data is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_kategori)
    {
        Kategori::whereid_kategori($id_kategori)->delete();
        return redirect()->route('kategori.index')->with('success', 'Data is successfully deleted ');
    }
}
