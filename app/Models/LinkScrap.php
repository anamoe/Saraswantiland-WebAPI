<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkScrap extends Model
{
    use HasFactory;
    protected $table = "link_scrap";

    protected $fillable = ['logo','nama','type','link'

    ];

}
