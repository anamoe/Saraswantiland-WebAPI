<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarRuangan;
use App\Models\DaftarLantai;
use App\Models\ProdukPerusahaan;
use App\Models\ProfilPerusahaan;
use App\Models\Promo;

class GetDataController extends Controller
{
    //

    public function getikhtisar(){

        return ProfilPerusahaan::all();

    }

    public function getproduk(){
        return ProdukPerusahaan::all();

    }

    public function getpromo(){
        return Promo::all();


    }

    public function getunitlantai(){
        return DaftarLantai::all();

     

    }
    public function getunitruangan($id){


       
        $r = DaftarRuangan::where('lantai_id',$id)->get();
        return $r;


    }
}
