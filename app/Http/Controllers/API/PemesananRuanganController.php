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
       return "sukses booking ruang kamar ";

       
    }

    public function getbooking(){

        return RiwayatPemesanan::all();
    }
    public function indexriwayat (){

        $r = RiwayatPemesanan::orderBy('id','DESC')->get();
        return view('riwayat.index',compact('r'));
    }

    public function addriwayat (Request $request){

        RiwayatPemesanan::create($request->all());
        return redirect()->back()->with('message', 'Data Berhasil Ditambahkan');
       
    }

    public function delriwayat ($id){

        RiwayatPemesanan::destroy($id);
        return redirect()->back()->with('message', 'Data Berhasil DiHapus');
       
    }

    public function upriwayat (Request $request,$id){

        RiwayatPemesanan::where('id',$id)->update([
            'nama_pemesan'=>$request->nama_pemesan,'no_telp'=>$request->no_telp
        ]);
        return redirect()->back()->with('message', 'Data Berhasil Diperbaharui');
       
    }

}
