<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category_kamar';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kamar()
    {
    	return $this->hasMany(Kamar::class, 'category_id');
    }
}
