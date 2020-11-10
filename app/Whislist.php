<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whislist extends Model
{
    protected $table = 'whislist';
    protected $guarded = ['id'];

    public function hotel()
    {
    	return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
