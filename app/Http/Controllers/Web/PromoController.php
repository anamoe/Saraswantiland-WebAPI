<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promo= Promo::all();
        return view('alatpemasaran.promo.index',compact('promo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Promo::create($request->except('_token'));
        // return redirect()->back()->with('message', 'Promo  Berhasil Ditambahkan');

        if(!$request->hasFile('image')){
            return redirect()->back()->with('error', 'Foto Promo Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('foto_promo');

    
        $file = $request->file('image');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
        // $file->move($tujuan_upload, $namaFile);
        $img = Image::make($file->path());
        $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
        Promo::create(['foto_promo' => $namaFile,'judul_promo'=>$request->judul_promo,'deskripsi_promo'=>$request->deskripsi_promo
        ]);
        // dd($file);
        return redirect()->back()->with('message', 'Promo Berhasil Ditambahkan');
    }

  
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

            
        if($request->hasFile('image3')){

        
            $tujuan_upload = public_path('foto_promo');
    
    
    
            $file = $request->file('image3');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . Promo::find($id)->foto_promo);
            // $file->move($tujuan_upload, $namaFile);
            $img = Image::make($file->path());
            $img->resize(500, 500, function ($const) {
                $const->aspectRatio();
            })->save($tujuan_upload.'/'.$namaFile);
            Promo::where('id',$id)->update(['foto_promo' => $namaFile,'judul_promo'=>$request->judul_promo,
            'deskripsi_promo'=>$request->deskripsi_promo]);


    
            return redirect()->back()->with('message', 'Promo Berhasil Diubah');
        }else{
    
            Promo::where('id',$id)->update(['judul_promo'=>$request->judul_promo,
            'deskripsi_promo'=>$request->deskripsi_promo]);
    
            return redirect()->back()->with('message', 'Promo Berhasil Diubah');
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tujuan_upload = public_path('foto_promo');
        $s = Promo::where('id', $id)->first();
        if ($s) {

            File::delete($tujuan_upload . '/' . $s->foto_promo);
            Promo::destroy($id);

            return redirect()->back()->with('message','Berhasil Hapus');
        }
    }
}
