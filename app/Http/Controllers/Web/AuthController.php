<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function register(Request $request){

        if (User::where('email', '=', $request->email)->first() == false) {
            $request->merge([
                'password' => bcrypt($request->password),
            ]);
            User::create($request->except(['_token']));
            return redirect('login')->with('message', 'Berhasil Mendaftar');
        } else {
            return redirect()->back()->with('message', 'EMAIL sudah terdaftar');
        }

    }

    public function logins(Request $request){
        $input = $request->all();

        if (User::where('email', '=', $input['email'])->first() == true) {
            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
               
                return redirect('/');
                   
            } else {
                return redirect()->back()
                    ->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()
                ->with('error', 'Email tidak ada atau belum terdaftar');
        }
    }
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
    public function login(){

        return view('auth.login.index');
    }
    

  
}
