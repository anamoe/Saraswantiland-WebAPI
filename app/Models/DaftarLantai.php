<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarLantai extends Model
{
    use HasFactory;
    protected $fillable=['nomor_lantai','status'

    ];

    public function getruang(){
        
    }
}
