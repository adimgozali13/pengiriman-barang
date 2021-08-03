<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelabuhanModel extends Model
{
    protected $table = 'pelabuhan';
    protected $fillable = ['nama_pelabuhan','id_negara'];
    public $timestamps = false;
}
