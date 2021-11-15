<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarRuangan extends Model
{
    use HasFactory;
    protected $fillable = ['lantai_id','nomor_ruangan','status','deskripsi'

    ];
}
