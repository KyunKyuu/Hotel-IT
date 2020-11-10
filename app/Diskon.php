<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskon';
    protected $fillable = ['kode_diskon','type','diskon','diskon_start','diskon_end', 'id_pembuat', 'kamar_id'];

    protected $dates = ['diskon_start', 'diskon_end'];
    
     
}
