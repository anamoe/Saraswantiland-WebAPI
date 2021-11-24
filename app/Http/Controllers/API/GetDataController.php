<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use Illuminate\Http\Request;
use App\Models\DaftarRuangan;
use App\Models\DaftarLantai;
use App\Models\FilosofiTagline;
use App\Models\ModelTampilanGedung3D;
use App\Models\ProdukPerusahaan;
use App\Models\ProfilPerusahaan;
use App\Models\Promo;
use Goutte\Client;


class GetDataController extends Controller
{
    //

    public function getikhtisar(){

        $pp =new ProfilPerusahaan;

        return response()->json([
        
            "IP" => [
                "foto"=>url('public/foto_profil/'.$pp->first()->foto),
                "deskripsi"=>$pp->first()->deskripsi
            ],
        ]);

       

    }

    public function getproduk(){
        $pp=  ProdukPerusahaan::get();
      

        // foreach ($pp as $key => $value) {
        //     # code...

        //     $array[]=[
        //         'id'=>$value->id,
          
        //         ];
       
        // }


        return response()->json([
            'produk' => $pp
        ]);

    }

    public function getpromo(){
        $p= Promo::all();
        return response()->json([
            'promo' => $p
        ]);

    }

    public function getfilosofi(){
        
        $f =new FilosofiTagline;
        return response()->json([
            "filosofi" => [
                "judul"=>$f->where('type','filosofi')->first()->judul,
                "deskripsi"=>$f->where('type','filosofi')->first()->deskripsi
            ],
        ]);

    }

    public function gettagline(){
         
        $f =new FilosofiTagline;
        return response()->json([
            "tagline" => [
                "judul"=>$f->where('type','tagline')->first()->judul,
                "deskripsi"=>$f->where('type','tagline')->first()->deskripsi
            ],
        ]);
    }
    public function getcontact(){
         
        $f =new FilosofiTagline;
        return response()->json([
            "kontak" => [
                "no_telp"=>$f->where('type','kontak')->first()->deskripsi
            ],
            "instagram" => [
                "Instagram"=>$f->where('type','instagram')->first()->deskripsi
            ],
            "website" => [
                "web"=>$f->where('type','website')->first()->deskripsi
            ],
        ]);

    }
    public function gettampilangedung3d(){
        $mtg= ModelTampilanGedung3D::all();

        return response()->json([
            'gedung' => $mtg
        ]);
     

    }

    public function getunitlantai(){

        
        $lantai =DaftarLantai::all();

        foreach ($lantai as $key => $value) {

            $total_ruangan =DaftarRuangan::where('lantai_id',$value->id)->count();

           
            $open = DaftarRuangan::where('status','open')->where('lantai_id',$value->id)->count();
            $hold = DaftarRuangan::where('status','hold')->where('lantai_id',$value->id)->count();
            $sold = DaftarRuangan::where('status','sold')->where('lantai_id',$value->id)->count();

            

            // return $hold;
            $presentase_o = $open / $total_ruangan;
            $presentase_h = $hold / $total_ruangan*100;
            $presentase_s = $sold / $total_ruangan*100;

          
            $value['status_jumlah_open'] ="$open/$total_ruangan";
            $value['status_progress_open'] ="$presentase_o";

            // $value['status_progres_hold'] =100- $presentase_h;
            // $value['status_progres_sold'] =100- $presentase_s;
           

        }

        // return $lantai;
   
     
  

        return response()->json([
            'Daftar Lantai' => $lantai
        ]);
     

    }
    public function getunitruangan($id){
       
        $r = DaftarRuangan::where('lantai_id',$id)->get();
        return response()->json([
            'Daftar Ruangan' => $r
        ]);
     


    }
    private $results = array();

    public function getdetik(){

        $client = new Client();
        $url = 'https://finance.detik.com/finansial?tag_from=wp_finance_firstnav_Finansial';
        $page = $client->request('GET', $url);
     

        /*echo "<pre>";
        print_r($page);*/

        // echo $page->filter('.maincounter-number')->text();

 
        $this->results= $page->filter('#major')->text();


        $data = $this->results;
        // return $data;
        return response()->json([
            "Data Market IHSG"=> $data
        ]);
        // return view('scraper', compact('data'));

    }


    public function getberanda(){

        $b = new Beranda();

        return response()->json([
            "ap" => [
                "foto"=>url('public/beranda/'.$b->where('type','ap')->first()->foto),
                "judul"=>$b->where('type','ap')->first()->judul
            ],
            "vt" => [
                "foto"=>url('public/beranda/'.$b->where('type','vt')->first()->foto),
                "judul"=>$b->where('type','vt')->first()->judul
            ],
            "du" => [
                "foto"=>url('public/beranda/'.$b->where('type','du')->first()->foto),
                "judul"=>$b->where('type','du')->first()->judul
            ],
            "ib" => [
                "foto"=>url('public/beranda/'.$b->where('type','ib')->first()->foto),
                "judul"=>$b->where('type','ib')->first()->judul
            ],
            "pp" => [
                "foto"=>url('public/beranda/'.$b->where('type','pp')->first()->foto),
                "judul"=>$b->where('type','pp')->first()->judul
            ],
            "ip" => [
                "foto"=>url('public/beranda/'.$b->where('type','ip')->first()->foto),
                "judul"=>$b->where('type','ip')->first()->judul
            ],
            "ws" => [
                "foto"=>url('public/beranda/'.$b->where('type','ws')->first()->foto),
                "judul"=>$b->where('type','ws')->first()->judul
            ],
            "sm" => [
                "foto"=>url('public/beranda/'.$b->where('type','sm')->first()->foto),
                "judul"=>$b->where('type','sm')->first()->judul
            ],
            "produk" => [
                "foto"=>url('public/beranda/'.$b->where('type','produk')->first()->foto),
                "judul"=>$b->where('type','produk')->first()->judul
            ],
        ]);

    }



  
}
