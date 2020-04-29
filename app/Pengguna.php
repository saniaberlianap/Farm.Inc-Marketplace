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

    public function jual()
    {
    	return $this->belongsTo(Produk::class, 'pengguna_id', 'id_pengguna');
    }
}
