<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jual extends Model
{
    protected  $table = 'jual';

    protected $primaryKey = 'id_jual';

    protected $fillable = ['pengguna_id', 'produk_id'];

    public function pengguna(){
    	return $this->belongsTo(Ruangan::class, 'pengguna_id', 'id_pengguna');
    }

    public function produk(){
    	return $this->belongsTo(Ruangan::class, 'produk_id', 'id_produk');
    }
}
