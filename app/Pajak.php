<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    protected $table = 'pajak';

    protected $guarded = [];

    public $timestamps = false;

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class);
     }

     public function pegawai(){
        return $this->belongsTo(Pegawai::class);
     }

     public function user(){
      return $this->belongsTo(User::class);
   }
}
