<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KapalModel extends Model
{
    protected $table = 'kapal';
    protected $fillable = ['nomor_kapal','nama_kapal','panjang','lebar','kapasitas_kontainer','kapasitas_tersedia'];
    public $timestamps = false;
}
