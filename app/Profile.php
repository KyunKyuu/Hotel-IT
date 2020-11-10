<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['user_id', 'last_name', 'tanggal_lahir', 'alamat', 'no_telpon', 'gambar', 'jenis_kelamin',

    ];
    public $timestamps = false;

     public function gambar()
   {
        return !$this->gambar ? asset('no-profile.jpg') : asset("storage/" . $this->gambar);

   }
}
