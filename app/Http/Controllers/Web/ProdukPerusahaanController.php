<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BisnisProperti;
use Illuminate\Http\Request;
use App\Models\ProdukPerusahaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
class ProdukPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = ProdukPerusahaan::all();
        return view('profil.produk.index',compact('produk'));
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
        if(!$request->hasFile('images')){
            return redirect()->back()->with('error', 'Foto  Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('foto_produk');

    
        $file = $request->file('images');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();

        $img = Image::make($file->path());
        $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
   
        // $file->move($tujuan_upload, $namaFile);
        ProdukPerusahaan::create(['foto' => $namaFile,'nama_produk_perusahaan'=>$request->nama_produk_perusahaan,
        'fasilitas'=>$request->fasilitas,'deskripsi'=>$request->deskripsi,'fasilitas'=> $request->fasilitas
        ]);

        // ProdukPerusahaan::create($request->except('_token'));
        return redirect()->back()->with('message', 'Produk Perusahaan Berhasil Ditambahkan');
        
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
        $produk = ProdukPerusahaan::where('id',$id)->first();
        
        return view('profil.produk.edit',compact('produk'));
    
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
        $produk = ProdukPerusahaan::where('id',$id)->first();
      
        return view('profil.produk.edit',compact('produk'));
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
            "nama_produk_perusahaan" => $request->nama_produk_perusahaan,
            "deskripsi" => $request->deskripsi,
            "fasilitas" => $request->fasilitas,
        ];
        // $file = $request->file('image');
        

        if($request->file('images')){

            
            $tujuan_upload = public_path('foto_produk');
    
            $file = $request->file('images');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . ProdukPerusahaan::find($id)->foto);
            
            $img = Image::make($file->path());
            $img->resize(500, 500, function ($const) {
                $const->aspectRatio();
            })->save($tujuan_upload.'/'.$namaFile);
            // $file->move($tujuan_upload, $namaFile);
            $req['foto'] = $namaFile;

            // dd($file);
            ProdukPerusahaan::where('id','=',$id)->update($req);
            
        }else{
            ProdukPerusahaan::where('id','=',$id)->update($req);

        }
        // ProdukPerusahaan::where('id', '=', $id)->update($request->except(['_token','_method']));
     
        return redirect('produk')->with('message', 'Produk Perusahaan Berhasil Diubah');
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
        ProdukPerusahaan::destroy($id);
        return redirect()->back()->with('message','Berhasil Dihapus');
    }
}
