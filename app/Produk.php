<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected  $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = ['kategori_id', 'nama_produk', 'deskripsi', 'harga', 'image'];

    public function kategori(){
    	return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }

    public function jual(){
    	return $this->belongsTo(Kategori::class, 'produk_id', 'id_produk');
    }

     

}
