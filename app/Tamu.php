<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'tamu';
    protected $guarded = ['id'];
    public $timestamps = false;

     public function gambar()
   {
        return !$this->gambar ? asset('no-profile.jpg') : asset("storage/" . $this->gambar);

   }
}
