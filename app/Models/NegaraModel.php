<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NegaraModel extends Model
{
    protected $table = 'negara';
    protected $fillable = ['nama_negara'];
    public $timestamps = false;
}
