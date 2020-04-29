<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pengguna = Pengguna::when($request->search, function($query) use($request){
            $query->where('nama', 'LIKE', '%'.$request->search.'%')
            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
            ->orWhere('alamat', 'LIKE', '%'.$request->search.'%')
            ->orWhere('nohp', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

         

        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
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
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'password' => 'required',
        ]);

      
        $form_data = array(
            'nama'    =>  $request->nama,
            'email'   =>  $request->email,
            'alamat'  =>  $request->alamat,
            'nohp'    =>  $request->nohp,
            'password'=>  bcrypt($request->password)
        );

        Pengguna::create($form_data);

        return redirect()->route('pengguna.index')->with('success', 'Data Added Successfully.');
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
    public function edit($id_pengguna)
    {
        $pengguna = Pengguna::find($id_pengguna);

        return view('pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengguna)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'password' => 'required',
        ]);

        $pengguna = Pengguna::find($id_pengguna);
        $pengguna->nama = $request->input('nama');
        $pengguna->email = $request->input('email');
        $pengguna->alamat = $request->input('alamat');
        $pengguna->nohp = $request->input('nohp');
        $pengguna->password = $request->input('password');
        $pengguna->save();
        return redirect()->route('pengguna.index')->with('success', 'Data is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_pengguna)
    {
        Pengguna::whereId_pengguna($id_pengguna)->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data is successfully deleted ');

        
    }
}
