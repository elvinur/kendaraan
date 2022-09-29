<?php

namespace App;

use App\Kendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'pegawai';

    protected $guarded = [];

    public function user(){

       return $this->belongsTo(User::class);
    }

    public function kendaraan(){

        return $this->hasOne(Kendaraan::class,'id','kendaraan_id');
     }

    public function transaksi(){

        return $this->hasMany(Transaksi::class);
    }
}
