<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DaftarLantai;
use Illuminate\Http\Request;
use App\Models\DaftarRuangan;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ruang= DaftarRuangan::with('getlantai')->get();
        return view('alatpemasaran.unit.ruang',compact('ruang'));
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
        
        $tujuan_upload = public_path('foto_ruangan');

    
        $file = $request->file('image2');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();

        $img = Image::make($file->path());
        $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
   
        // $file->move($tujuan_upload, $namaFile);
        DaftarRuangan::create([
            "foto_ruangan"=>$namaFile,
            "nomor_ruangan"=>$request->nomor_ruangan,
            "status"=>$request->status,
            "deskripsi"=>$request->deskripsi,
            "type"=>$request->type,
            "luas"=>$request->luas,
            "link_youtube"=>$request->link_youtube,
            "lantai_id"=>$request->lantai_id,
       
        
        ]);

    
        // DaftarRuangan::create($request->except('_token'));
        return redirect()->back()->with('message', 'Ruangan Berhasil Ditambahkan');
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
        
        $ruang= DaftarRuangan::where('lantai_id',$id)->with('getlantai')->get();
                   //
                   $lantai= DaftarLantai::where('id',$id)->first();
        return view('alatpemasaran.unit.ruang',compact('ruang','id','lantai'));
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
        $ruang= DaftarRuangan::where('lantai_id',$id)->with('getlantai')->get();
           //
      

        return view('alatpemasaran.unit.ruang',compact('ruang','id'));
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

        // DaftarRuangan::where('id', '=', $id)->update($request->except(['_token','_method']));

             
        if($request->hasFile('image3')){

        
            $tujuan_upload = public_path('foto_ruangan');
    
            $file = $request->file('image3');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' .DaftarRuangan::find($id)->foto_ruangan);
            // $file->move($tujuan_upload, $namaFile);
            $img = Image::make($file->path());
            $img->resize(1000, 1000, function ($const) {
                $const->aspectRatio();
            })->save($tujuan_upload.'/'.$namaFile);
            DaftarRuangan::where('id',$id)->update(['foto_ruangan' => $namaFile,'nomor_ruangan'=>$request->nomor_ruangan,
            'lantai_id'=>$request->lantai_id,  'type'=>$request->type,  'luas'=>$request->luas,  'link_youtube'=>$request->link_youtube,
            'status'=>$request->status,  'deskripsi'=>$request->deskripsi
        
            ]);

        }else{
    
            DaftarRuangan::where('id',$id)->update(['nomor_ruangan'=>$request->nomor_ruangan,
            'lantai_id'=>$request->lantai_id,  'type'=>$request->type,  'luas'=>$request->luas,  'link_youtube'=>$request->link_youtube,
            'status'=>$request->status,  'deskripsi'=>$request->deskripsi]);
    
        }

        if($request->lantai_id){


            $ruang_open = DaftarRuangan::where('lantai_id',$request->lantai_id)->where('status','open')->first();
            $ruang_hold = DaftarRuangan::where('lantai_id',$request->lantai_id)->where('status','hold')->first();
            $ruang_sold = DaftarRuangan::where('lantai_id',$request->lantai_id)->where('status','sold')->first();

            
            if($ruang_open || $request->status == "open"){
                $status_lantai = "open";

            }else if($ruang_hold || $request->status == "hold" ){
                $status_lantai = "hold";

            }else if($ruang_sold || $request->status == "sold"){
                $status_lantai = "sold";
            }
            
        
        }
        
        DaftarLantai::where('id', '=', $request->lantai_id)
        ->update([
            'status'=> $status_lantai
        ]);

        return redirect()->back()->with('message','Update Berhasil');
     
 
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

        $tujuan_upload = public_path('foto_ruangan');
        $s = DaftarRuangan::where('id', $id)->first();
        if ($s) {

            File::delete($tujuan_upload . '/' . $s->foto_ruangan);
            DaftarRuangan::destroy($id);

            return redirect()->back()->with('message','Berhasil Dihapus');
        }
      
      
        
    }
}
