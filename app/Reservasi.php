<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['check_in', 'check_out'];
    
    public function CategoryKamar()
    {
    	return $this->belongsTo(CategoryKamar::class,'category_kamar_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ReservasiPembayaran()
    {
        return $this->hasOne(ReservasiPembayaran::class,'reservasi_id');
    }

    public function Request()
    {
        return $this->hasOne(ReservasiRequest::class, 'reservasi_id');
    }

  
}
