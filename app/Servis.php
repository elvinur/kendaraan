<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table = 'servis';

    protected $guarded = [];

   public function scopeUser($query, $pegawai_id = null)
   {
     if (is_null($pegawai_id)) $pegawai_id = Auth::id();
        return $query->where('pegawai_id', $pegawai_id);
   }

   public function kendaraan()
   {
        return $this->belongsTo(Kendaraan::class);
   }

   public function pegawai()
   {
    return $this->belongsTo(Pegawai::class);
   }
}
