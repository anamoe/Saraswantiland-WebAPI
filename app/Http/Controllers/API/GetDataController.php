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
use App\Models\BisnisProperti;
use App\Models\KeuntunganInvestasi;

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
        foreach ($pp as $key => $value) {
            # code...
            $value['foto'] =url('public/foto_produk/'.$value->foto);
        }
      


        return response()->json([
            'produk' => $pp
        ]);

    }

    public function getpromo(){
        $p= Promo::all();

        foreach ($p as $key => $value) {
            # code...
            $value['foto_promo'] =url('public/foto_promo/'.$value->foto_promo);
        }
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
        $mtg=  ModelTampilanGedung3D::all();

        foreach ($mtg as $key => $value) {
            # code...
            $value['foto_gedung'] =url('public/foto_tampilangedung/'.$value->foto_gedung);
        }

        return response()->json([
            'gedung' =>$mtg
        ]);
     

    }

    public function getunitlantai(){

        
        $lantai =DaftarLantai::all();

        foreach ($lantai as $key => $value) {

            $total_ruangan =DaftarRuangan::where('lantai_id',$value->id)->count();

           
            $open = DaftarRuangan::where('status','open')->where('lantai_id',$value->id)->count();
            $hold = DaftarRuangan::where('status','hold')->where('lantai_id',$value->id)->count();
            $sold = DaftarRuangan::where('status','sold')->where('lantai_id',$value->id)->count();

            
            if($open!=0){
                $progres= $open / $total_ruangan;


            }else{

                $progres = "ruangan-kosong";

            }
         
          

          
            $value['status_jumlah_open'] ="$open/$total_ruangan";
            $value['status_progress_open'] ="$progres";
            // $value['status_progress_h'] ="$presentase_h";
            // $value['status_progress_s'] ="$presentase_s";
            // $value['status_progress_all'] ="$presentase";
            $value['foto_lantai'] =url('public/foto_lantai/'.$value->foto_lantai);

        }



        return response()->json([
            'Daftar Lantai' => $lantai
        ]);
     

    }
    public function getunitruangan($id){
       
        $r = DaftarRuangan::where('lantai_id',$id)->get();

        foreach ($r as $key => $value) {
            $value['foto_ruangan'] =url('public/foto_ruangan/'.$value->foto_ruangan);
           
        }
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

    public function getbisnis(){
        $r =BisnisProperti::get();

        foreach ($r as $key => $value) {
            $value['foto'] =url('public/bisnisproperti/'.$value->foto);
           
        }
        return response()->json([
            'Bisnis Properti' => $r
        ]);
     

    }

    public function getinvestasi(){
        $r =KeuntunganInvestasi::get();

        foreach ($r as $key => $value) {
            $value['foto'] =url('public/keuntunganinvestasi/'.$value->foto);
           
        }
        return response()->json([
            'Investasi' => $r
        ]);
     

    }



  
}
