<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarLantai;
use App\Models\DaftarRuangan;


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
      
        $idlantai = DaftarLantai::create([
            "nomor_lantai"=>$request->nomor_lantai,
            "status"=>$request->status,
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
        //
        $l = DaftarLantai::where('id',$id)->first();
        $l->update($request->all());

         DaftarRuangan::where('lantai_id',$id)->update([
            'status' =>$request->status
        ]);

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
