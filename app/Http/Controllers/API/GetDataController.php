<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarRuangan;
use App\Models\DaftarLantai;
use App\Models\FilosofiTagline;
use App\Models\ModelTampilanGedung3D;
use App\Models\ProdukPerusahaan;
use App\Models\ProfilPerusahaan;
use App\Models\Promo;

class GetDataController extends Controller
{
    //

    public function getikhtisar(){

        $pp =ProfilPerusahaan::all();

        return response()->json([
            'Ikhtisar Perusahaan' => $pp
        ]);

    }

    public function getproduk(){
        $pp= ProdukPerusahaan::all();
        return response()->json([
            'Produk Perusahaan' => $pp
        ]);

    }

    public function getpromo(){
        $p= Promo::all();
        return response()->json([
            'Promo' => $p
        ]);

    }

    public function getfilosofi(){
        
        $filosofi = FilosofiTagline::where('type','filosofi')->first();
        return response()->json([
            'Filosofi' => $filosofi
        ]);

    }

    public function gettagline(){
        $fs = FilosofiTagline::where('type','tagline')->first();
        return response()->json([
            'Tagline' => $fs
        ]);

    }
    public function getcontact(){
        $fs =  FilosofiTagline::where('type','kontak')->first();
        return response()->json([
            'Contact' => $fs
        ]);

    }
    public function gettampilangedung3d(){
        $mtg= ModelTampilanGedung3D::all();

        return response()->json([
            'Tampilan Gedung' => $mtg
        ]);
     

    }

    public function getunitlantai(){
        $df= DaftarLantai::all();
        return response()->json([
            'Daftar Lantai' => $df
        ]);
     

    }
    public function getunitruangan($id){
       
        $r = DaftarRuangan::where('lantai_id',$id)->get();
        return response()->json([
            'Daftar Ruangan' => $r
        ]);
     


    }
}
