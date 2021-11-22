<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilosofiTagline;

class FilosofiTaglineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $filosofi= FilosofiTagline::where('type','filosofi')->get();
        return view('alatpemasaran.filosofi.index',compact('filosofi'));
       
    }
    public function indextagline()
    {
        //
        $tagline= FilosofiTagline::where('type','tagline')->get();
        return view('alatpemasaran.tagline.index',compact('tagline'));
       
    }

    public function indexcontact()
    {
        //
        $contact= FilosofiTagline::whereIn('type',['instagram','website','kontak'])->get();
        return view('alatpemasaran.contact.index',compact('contact'));
       
    }

    public function updatetagline(Request $request)
    {
        //
        $ft = FilosofiTagline::where('type','tagline')->first();
        $ft->update($request->except(['_token','_method']));
     
        return redirect('tagline')->with('message', 'Tagline Perusahaan Berhasil Diubah');
    
       
    }

    public function updatefilosofi(Request $request)
    {
        //
    
        $ft = FilosofiTagline::where('type','filosofi')->first();
        $ft->update($request->except(['_token','_method']));
     
        return redirect('filosofi')->with('message', 'Filosofi Perusahaan Berhasil Diubah');
       
    }

    public function updatekontak(Request $request)
    {
        //
     
        $ft = FilosofiTagline::where('type','kontak')->first();
        $ft->update($request->except(['_token','_method']));
     
     
        return redirect('contact')->with('message', 'KontakPerusahaan Berhasil Diubah');
       
    }
    public function showtagline()
    {
        //
      
        $ft = FilosofiTagline::where('type','tagline')->first();
        return view('alatpemasaran.tagline.edit',compact('ft'));
        
    
    }

    public function showfilosofi()
    {
        //
      
        $ft = FilosofiTagline::where('type','filosofi')->first();
        return view('alatpemasaran.filosofi.edit',compact('ft'));
        
    
    }

   }
