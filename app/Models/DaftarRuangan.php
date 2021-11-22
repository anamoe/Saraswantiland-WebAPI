<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarRuangan extends Model
{
    use HasFactory;
    protected $fillable = ['lantai_id','nomor_ruangan','status','deskripsi','type','luas','link_youtube','foto_ruangan'

    ];

    public function getlantai(){
        return $this->belongsTo(DaftarLantai::class,'lantai_id');
    }
}
