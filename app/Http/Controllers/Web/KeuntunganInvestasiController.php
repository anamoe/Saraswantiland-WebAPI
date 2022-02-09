<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\KeuntunganInvestasi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class KeuntunganInvestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $k= KeuntunganInvestasi::all();
        return view('keuntunganinvestasi.index',compact('k'));
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
            return redirect()->back()->with('error', 'Foto  Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('keuntungan_investasi');

    
        $file = $request->file('image');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();

        $img = Image::make($file->path());
        $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
   
        // $file->move($tujuan_upload, $namaFile);
        KeuntunganInvestasi::create(['foto' => $namaFile,'judul'=>$request->judul,"deskripsi"=>$request->deskripsi
        ]);
        // dd($file);
        return redirect()->back()->with('message', 'Foto Bisnis Properti Berhasil Ditambahkan');
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
        $k = KeuntunganInvestasi::where('id',$id)->first();
        
        return view('keuntunganinvestasi.edit',compact('k'));
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
        $req =  [
     
            "deskripsi" => $request->deskripsi,
            "judul" => $request->judul,
        ];
        if($request->hasFile('image3')){

        
            $tujuan_upload = public_path('keuntungan_investasi');
    
    
            $file = $request->file('image3');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . KeuntunganInvestasi::find($id)->foto);
            // $file->move($tujuan_upload, $namaFile);
            $img = Image::make($file->path());
            $img->resize(500, 500, function ($const) {
                $const->aspectRatio();
            })->save($tujuan_upload.'/'.$namaFile);
            // KeuntunganInvestasi::where('id',$id)->update(['foto' => $namaFile]);
            $req['foto'] = $namaFile;

            KeuntunganInvestasi::where('id','=',$id)->update($req);
    
  
        }
        else{
            KeuntunganInvestasi::where('id','=',$id)->update($req);

        }
        return redirect('investasi')->with('message', 'Produk Perusahaan Berhasil Diubah');
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
        $tujuan_upload = public_path('keuntungan_investasi');
        $s = KeuntunganInvestasi::where('id', $id)->first();
        if ($s) {

            File::delete($tujuan_upload . '/' . $s->foto);
            KeuntunganInvestasi::destroy($id);

            return redirect()->back()->with('message','Berhasil Dihapus');
        }
      
    }
}
