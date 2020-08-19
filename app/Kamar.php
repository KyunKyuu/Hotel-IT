<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kamar extends Model
{
	use Sluggable;

    protected $table = 'kamar';
    protected $fillable = ['kode_kamar', 'fasilitas_kamar', 'status_kamar', 'gambar_kamar','kapasitas_kamar', 'jumlah_kamar', 'jumlah_kamar_terisi', 'category_id', 'slug', 'content'];
    public $timestamps = false;
      public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'kode_kamar'
            ]
        ];
    }

    public function gambar_kamar()
   {
        return !$this->gambar_kamar ? asset('no-thumbnail.jpg') :  asset("storage/" . $this->gambar_kamar);
   }



    }

