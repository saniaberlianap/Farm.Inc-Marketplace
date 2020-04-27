<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jual', function (Blueprint $table) {
            $table->bigIncrements('id_jual');
            $table->unsignedBigInteger('pengguna_id');
            $table->unsignedBigInteger('produk_id');
            $table->timestamps();


            $table->foreign('pengguna_id')->references('id_pengguna')->on('pengguna')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');


            $table->foreign('produk_id')->references('id_produk')->on('produk')
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
        Schema::dropIfExists('jual');
    }
}
