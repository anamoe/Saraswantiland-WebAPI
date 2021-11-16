<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPemesanan;

class PemesananRuanganController extends Controller
{
    //
    public function addbooking(Request $request){

       $rp= $request->all();
       RiwayatPemesanan::create($rp);
       return "sukses booking ruangan ";

       
    }

    public function getbooking(){

        return RiwayatPemesanan::all();
    }
    public function indexriwayat (){
        return view('riwayat.index');
    }

}
