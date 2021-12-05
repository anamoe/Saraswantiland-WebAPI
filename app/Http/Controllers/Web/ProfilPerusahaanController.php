<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilPerusahaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ProfilPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = ProfilPerusahaan::all();
        return view('profil.ikhtisar.index',compact('profil'));
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
        $ikhtisar = ProfilPerusahaan::where('id',$id)->first();
      
        return view('profil.ikhtisar.edit',compact('ikhtisar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ikhtisar = ProfilPerusahaan::where('id',$id)->first();
      
        return view('profil.ikhtisar.edit',compact('ikhtisar'));
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
        $req =  [
            "deskripsi" => $request->deskripsi,
            "konten" => $request->konten,
            "iframe" => $request->iframe,
        ];
        // $file = $request->file('image');
        

        if($request->file('images')){

            
            $tujuan_upload = public_path('foto_profil');
    
            $file = $request->file('images');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . ProfilPerusahaan::find($id)->foto);
            $file->move($tujuan_upload, $namaFile);
            $req['foto'] = $namaFile;

            // dd($file);
            ProfilPerusahaan::where('id','=',$id)->update($req);
            
        }else{
            ProfilPerusahaan::where('id','=',$id)->update($req);

        }
       
        
       
        return redirect('ikhtisar')->with('message', 'Ikhtisar Perusahaan Berhasil Diubah');
        
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
