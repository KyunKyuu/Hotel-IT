<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected  $table = 'reviews';

    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function child()
    {
        return $this->hasMany(Review::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
