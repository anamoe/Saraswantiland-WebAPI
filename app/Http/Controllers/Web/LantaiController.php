<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarLantai;
use App\Models\DaftarRuangan;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;



class LantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lantai= DaftarLantai::all();
        return view('alatpemasaran.unit.lantai',compact('lantai'));
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

        if(!$request->hasFile('imagelantai')){
            return redirect()->back()->with('error', 'Foto Gedung Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('foto_lantai');

    
        $file = $request->file('imagelantai');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
        $img = Image::make($file->path());
        $img->resize(1000, 1000, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
        // $file->move($tujuan_upload, $namaFile);
      
        $idlantai = DaftarLantai::create([
            "nomor_lantai"=>$request->nomor_lantai,
            "status"=>$request->status,
            "foto_lantai"=>$namaFile
        ])->id;
        if($request->has('nomor_ruangan')){
            foreach($request->nomor_ruangan as $no=>$nomor_ruangan){
                DaftarRuangan::create([
                    "nomor_ruangan"=>$nomor_ruangan,
                    "status"=>$request->status_ruangan[$no],
                    "deskripsi"=>$request->deskripsi[$no],
                    "type"=>$request->type[$no],
                    "luas"=>$request->luas[$no],
                    "link_youtube"=>$request->link_youtube[$no],
                    "lantai_id"=>$idlantai,
                ]);
            }
        }
        return redirect()->back()->with('message', 'Lantai Berhasil Ditambahkan');
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
        

     

        if($request->hasFile('image3')){
          

        
            $tujuan_upload = public_path('foto_lantai');
    
    
    
            $file = $request->file('image3');
           
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' .DaftarLantai::find($id)->foto_lantai);
            // $file->move($tujuan_upload, $namaFile);
            $img = Image::make($file->path());
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save($tujuan_upload.'/'.$namaFile);
            DaftarLantai::where('id',$id)->update(['foto_lantai' => $namaFile,'nomor_lantai'=>$request->nomor_lantai,
            'status'=>$request->status
        
            ]);
            
            DaftarRuangan::where('lantai_id',$id)->update([
                'status' =>$request->status
            ]);

    
        }else{
            DaftarLantai::where('id',$id)->update(['nomor_lantai'=>$request->nomor_lantai,
            'status'=>$request->status,
        
            ]);
            DaftarRuangan::where('lantai_id',$id)->update([
                'status' =>$request->status
            ]);
    


        }

        // $l = DaftarLantai::where('id',$id)->first();
        // $l->update($request->all());

        //  DaftarRuangan::where('lantai_id',$id)->update([
        //     'status' =>$request->status
        // ]);

        return redirect()->back()->with('message','Update Berhasil ');

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

        DaftarRuangan::where('lantai_id',$id)->delete();
        DaftarLantai::destroy($id);

        return redirect()->back()->with('message','Berhasil Hapus');
    }
}
