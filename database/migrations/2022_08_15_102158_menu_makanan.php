<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MenuMakanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_makanan',function(Blueprint $table){
            $table->id();
            $table->string('nama_barang');
            $table->integer('harga_barang');
            $table->string('userlog');
            $table->timestamps();
            $table->string('jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_makanan');
    }
}
