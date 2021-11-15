<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPemesanan extends Model
{
    use HasFactory;
    protected $fillable =['nama_pemesan','no_telp','booking_ruangan_id'];
}
