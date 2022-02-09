<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unit = Unit::orderBy('id','DESC')->get();
        
        return view('alatpemasaran.unit.unit',compact('unit'));
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
        
         $req = [
            
             "nama_unit"=>$request->nama_unit,
     
            ];
        
     if(!$request->hasFile('image2')){
            return redirect()->back()->with('error', 'Foto  Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('foto_denah');
        $file = $request->file('image2');
        $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
        $img = Image::make($file->path());
        $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
         $req['foto_denah'] = $namaFile;
        
        //   if($request->hasFile('image3')){
        
        $tujuan_upload2 = public_path('foto_unit');
        $file2 = $request->file('image3');
        $namaFile2 = Carbon::now()->format('Ymd') . $file2->getClientOriginalName();
        $img2 = Image::make($file2->path());
        $img2->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload2.'/'.$namaFile2);
          $req['foto_unit'] = $namaFile2;
        
        //   }
       
        // dd([$file,$file2,$file3,$file4]);
        
    
        Unit::create($req);
   

     
        return redirect()->back()->with('message', 'Unit Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    }
}
