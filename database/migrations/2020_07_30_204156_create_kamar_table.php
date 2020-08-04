<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kamar');
            $table->string('harga_kamar');
            $table->string('fasilitas_kamar');
            $table->enum('status_kamar',['tersedia','tidak tersedia']);
            $table->string('gambar_kamar')->nullable();
            $table->foreignid('category_id');
            $table->string('slug');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamar');
    }
}
