<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id_produk');
            $table->unsignedBigInteger('pengguna_id');
            $table->string('nama_produk');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('image');
            $table->timestamps();


            $table->foreign('pengguna_id')->references('id_pengguna')->on('pengguna')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
