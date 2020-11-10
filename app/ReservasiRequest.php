<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservasiRequest extends Model
{
    protected $table = 'reservasi_request';
    protected $guarded = ['id'];
    public $timestamps = false;
}
