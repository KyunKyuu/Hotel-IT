<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignid('reservasi_id');
            $table->date('tgl_pembayaran');
            $table->string('nominal_pembayaran');
            $table->string('uang_bayar');
            $table->string('uang_kembalian');
            $table->enum('status', ['lunas','belum lunas']); 
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
        Schema::dropIfExists('reservasi_pembayaran');
    }
}
