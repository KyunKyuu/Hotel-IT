<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservasiPembayaran extends Model
{
    protected  $table = 'reservasi_pembayaran';
    protected  $guarded = ['id', 'created_at', 'updated_at'];
}
