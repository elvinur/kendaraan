<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;
    
    protected $table = 'transaksi';

    protected $guarded = []; 

    public function kendaraan(){

        return $this->belongsTo(Kenaraan::class);
    }

    public function Pegawai(){

        return $this->belongsTo(Pegawai::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
