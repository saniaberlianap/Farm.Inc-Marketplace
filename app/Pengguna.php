<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
    						'nama', 'email', 'password', 'alamat', 'nohp'
    					  ];

    public function produk()
    {
    	return $this->hasMany(Produk::class, 'kategori_id', 'id_kategori');
    }
}
