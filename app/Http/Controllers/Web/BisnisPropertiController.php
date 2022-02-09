<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\BisnisProperti;

class BisnisPropertiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $b= BisnisProperti::all();
        return view('bisnisproperti.index',compact('b'));
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
            return redirect()->back()->with('error', 'Foto Bisnis Properti Tidak Boleh Kosong');
        }
        
        $tujuan_upload = public_path('bisnisproperti');

    
        $file = $request->file('image');
    
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();

        $img = Image::make($file->path());
        $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($tujuan_upload.'/'.$namaFile);
   
        // $file->move($tujuan_upload, $namaFile);
        BisnisProperti::create(['foto' => $namaFile
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

        
            $tujuan_upload = public_path('bisnisproperti');
    
    
            $file = $request->file('image3');
            $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
            File::delete($tujuan_upload . '/' . BisnisProperti::find($id)->foto);
            // $file->move($tujuan_upload, $namaFile);
            $img = Image::make($file->path());
            $img->resize(500, 500, function ($const) {
                $const->aspectRatio();
            })->save($tujuan_upload.'/'.$namaFile);
            BisnisProperti::where('id',$id)->update(['foto' => $namaFile]);
    
            return redirect()->back()->with('message', 'Foto Berhasil Diubah');
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

        $tujuan_upload = public_path('bisnisproperti');
        $s = BisnisProperti::where('id', $id)->first();
        if ($s) {

            File::delete($tujuan_upload . '/' . $s->foto);
            BisnisProperti::destroy($id);
        }

        return redirect()->back()->with('message','Berhasil Dihapus');
    }
    
}
