<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryHotel extends Model
{
     protected $table = 'category_hotel';

    protected $guarded = ['id'];
    public $timestamps = false;

    public function hotel()
    {
    	return $this->hasMany(Hotel::class, 'id');
    }
}
