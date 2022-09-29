<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BBM extends Model
{
    protected $table = 'bbm';

    protected $guarded = [];

    public $timestamps = false;

    public function kendaraan(){
        return $this->hasOne(Kendaraan::class);
     }

     public function pegawai(){
        return $this->hasOne(Pegawai::class);
     }
}
