<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Kamar extends Model
{
	

    protected $table = 'kamar';
    protected $fillable = ['kode_kamar','fasilitas_icon_kamar', 'fasilitas_text_kamar','status_kamar', 'gambar_kamar','kapasitas_kamar', 'jumlah_kamar', 'category_id', 'content'];
    public $timestamps = false;
     

    public function gambar_kamar()
   {
        return !$this->gambar_kamar ? asset('no-thumbnail.jpg') :  asset("storage/" . $this->gambar_kamar);
        
   }



    }

