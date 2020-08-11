<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryKamar extends Model
{
    protected $table = 'category_kamar';

    protected $guarded = ['id'];
    public $timestamps = false;

    public function kamar()
    {
    	return $this->hasMany(Kamar::class, 'id');
    }


    public function hotels()
    {
    	return $this->belongsTo(Hotel::class, 'hotel_id');

    }
}
