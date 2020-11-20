<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Hotel extends Model
{
	use Sluggable;

	protected $table = 'hotel';
  	protected $guarded = ['id', 'created_at', 'updated_at'];
   	
  	 public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nama_hotel'
            ]
        ];
    }

      public function gambar_hotel()
   {
        return !$this->gambar_hotel ? asset('no-thumbnail.jpg') :  asset("storage/" . $this->gambar_hotel);
   }

      public function gambar_hotel2()
   {
        return !$this->gambar_hotel2 ? asset('no-thumbnail.jpg') :  asset("storage/" . $this->gambar_hotel2);
   }

      public function gambar_hotel3()
   {
        return !$this->gambar_hotel3 ? asset('no-thumbnail.jpg') :  asset("storage/" . $this->gambar_hotel3);
   }

      public function gambar_hotel4()
   {
        return !$this->gambar_hotel4 ? asset('no-thumbnail.jpg') :  asset("storage/" . $this->gambar_hotel4);
   }

      public function gambar_hotel5()
   {
        return !$this->gambar_hotel5 ? asset('no-thumbnail.jpg') :  asset("storage/" . $this->gambar_hotel5);
   }

   	public function CategoriesKamar()
   	{
   		return $this->hasMany(CategoryKamar::class, 'id');
   	}

   	public function CategoriesHotel()
   	{
   		return $this->belongsTo(CategoryHotel::class, 'category_hotel_id');
   	}

    public function Whislist()
    {
      return $this->hasMany(Whislist::class, 'id');
    }

}
