<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelTampilanGedung3D;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class TampilanGedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gedung= ModelTampilanGedung3D::all();
        return view('alatpemasaran.gedung.index',compact('gedung'));
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
        if(!$request->hasFile('image')){
            return redirect()->back()->with('error', 'Foto Gedung Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('foto_tampilangedung');

    
        $file = $request->file('image');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
        $file->move($tujuan_upload, $namaFile);
        ModelTampilanGedung3D::create(['foto_gedung' => $namaFile
        ]);
        // dd($file);
        return redirect()->back()->with('message', 'Foto Gedung Berhasil Ditambahkan');
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


        
        if($request->hasFile('image3')){

        
            $tujuan_upload = public_path('foto_tampilangedung');
    
    
            $file = $request->file('image3');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . ModelTampilanGedung3D::find($id)->foto_gedung);
            $file->move($tujuan_upload, $namaFile);
            ModelTampilanGedung3D::where('id',$id)->update(['foto_gedung' => $namaFile]);
    
            return redirect()->back()->with('message', 'Gedung Berhasil Diubah');
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
        $tujuan_upload = public_path('foto_tampilangedung');
        $s = ModelTampilanGedung3D::where('id', $id)->first();
        if ($s) {

            File::delete($tujuan_upload . '/' . $s->foto_gedung);
            ModelTampilanGedung3D::destroy($id);
        }

        return redirect()->back()->with('message','Berhasil Dihapus');
    }
}
