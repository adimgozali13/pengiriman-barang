<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanModel extends Model
{
     protected $table = 'pengiriman';
        protected $fillable = ['nomor_barang','nama_barang','berat_barang','pelabuhan_asal','pelabuhan_tujuan','status_pengiriman','id_kontainer'];
        public $timestamps = false;
}

