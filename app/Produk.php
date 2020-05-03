<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected  $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = ['pengguna_id', 'nama_produk', 'kategori', 'deskripsi', 'harga', 'image'];

    public function pengguna(){
    	return $this->belongsTo(Pengguna::class, 'pengguna_id', 'id_pengguna');
    }


     

}
