<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontainerModel extends Model
{
   protected $table = 'kontainer';
   protected $fillable = ['nama_kontainer','nomor_kontainer','ukuran','kapasitas_berat','kapasitas_tersedia_k','id_kapal'];
   public $timestamps = false;
}
