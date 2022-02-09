<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BisnisProperti extends Model
{
    use HasFactory;
    protected $table = "bisnis_properti";

    protected $fillable = ['foto'

    ];
}
