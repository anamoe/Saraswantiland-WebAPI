<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $b = Beranda::all();
        return view('profil.beranda.index',compact('b'));
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

        if(!$request->hasFile('image2')){
            return redirect()->back()->with('error', 'Foto  Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('beranda');

    
        $file = $request->file('image2');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
        // $file->move($tujuan_upload, $namaFile);
        $img = Image::make($file->path());
        $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
        Beranda::create(['foto' => $namaFile,'judul'=>$request->judul,'type'=>$request->type
        ]);
        // dd($file);
        return redirect()->back()->with('message', 'Beranda Berhasil Ditambahkan');
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

        
            $tujuan_upload = public_path('beranda');
    
    
    
            $file = $request->file('image3');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . Beranda::find($id)->foto);
            // $file->move($tujuan_upload, $namaFile);

            $img = Image::make($file->path());
            $img->resize(500, 500, function ($const) {
                $const->aspectRatio();
            })->save($tujuan_upload.'/'.$namaFile);
            Beranda::where('id',$id)->update(['foto' => $namaFile,'judul'=>$request->judul,
            'type'=>$request->type]);

            return redirect()->back()->with('message', 'Beranda yang anda Pilih Berhasil Diubah');
    
        }else{
    
            Beranda::where('id',$id)->update(['judul'=>$request->judul,
            'type'=>$request->type]);
    
            return redirect()->back()->with('message', 'Beranda yang anda Pilih Berhasil Diubah');
    
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

        $tujuan_upload = public_path('beranda');
        $s = Beranda::where('id', $id)->first();
        if ($s) {

            File::delete($tujuan_upload . '/' . $s->foto);
            Beranda::destroy($id);

            return redirect()->back()->with('message','Berhasil Hapus');
        }
    }
}
