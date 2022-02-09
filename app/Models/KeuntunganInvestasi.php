<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuntunganInvestasi extends Model
{
    use HasFactory;
    protected $table = "keuntungan_investasi";

    protected $fillable = ['foto','judul','deskripsi'

    ];
}
