<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $guarded = [];
    

    public function pegawai(){

        return $this->hasMany(Pegawai::class);
    }
}
