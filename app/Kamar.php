<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kamar extends Model
{
	use Sluggable;

    protected $table = 'kamar';
    protected $guarded= ['id', 'created_at', 'updated_at'];

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



    public function category()
    {
    	return $this->belongsTo(Category::class, 'id');
    }
}

// "/storage/no-thumbnail.jpg"