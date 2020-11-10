<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class CategoryKamar extends Model
{
    use Sluggable;
    
    protected $table = 'category_kamar';

    protected $fillable = ['hotel_id', 'nama_category', 'harga','slug', 'id_pembuat'];
    
     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nama_category'
            ]
        ];
    }


    public function kamar()
    {
    	return $this->hasOne(Kamar::class, 'category_id');
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id');
    }

   

    public function hotels()
    {
    	return $this->belongsTo(Hotel::class, 'hotel_id');

    }

    public function diskon()
    {
        return $this->hasOne(Diskon::class, 'kamar_id');
    }
}
