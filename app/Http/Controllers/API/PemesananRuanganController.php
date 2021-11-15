<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPemesanan;

class PemesananRuanganController extends Controller
{
    //
    public function addbooking(Request $request){

       $rp= $request->input()->all();
       RiwayatPemesanan::create($rp);
       
    }
}
