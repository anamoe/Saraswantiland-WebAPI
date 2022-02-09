<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function registers(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'password'              => 'required',
            // 'konfirmasi_password' => 'same:password'
        ]);

        if($request->password!=$request->konfirmasi_password){
            return redirect()->back()->with('error', 'Pastikan Password dan Konfirmasi Password Sama');

        }


        if (User::where('email', '=', $request->email)->first() == false) {
            $request->merge([
                'password' => bcrypt($request->password),

            ]);
            User::create($request->except(['_token']));
            return redirect('login')->with('message', 'Berhasil Mendaftar');
        } else {
            return redirect()->back()->with('error', 'EMAIL sudah terdaftar');
        }

    }

    public function logins(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
            
         ]);
        $input = $request->all();

        if (User::where('email', '=', $input['email'])->first() == true) {
            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
               
                return redirect('/')->with('message', 'Login Sukses');
                   
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

    public function register(){

        return view('auth.register');
    }


    public function index()
    {
        $users = User::where('id', auth()->user()->id)->first();
        return view('profil.profil-admin.index', compact('users'));

        // return view('profile');
    }

    public function update_profil(Request $request)
    {

        User::where('id', '=', Auth::user()->id)->update($request->all());
        return redirect()->back()->with('message', ' Berhasil diperbarui');
    }

    public function update_foto(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $tujuan_upload = public_path('profile');

        // if(Auth::user()->foto != "profilesiswa.png" && file_exists($tujuan_upload.'/'.Auth::user()->foto)){
        //         File::delete($tujuan_upload.'/'.Auth::user()->foto);
        //     }

        $file = $request->file('image');
        $namaFile = Carbon::now()->format('YmdHs') . $file->getClientOriginalName();
        $file->move($tujuan_upload, $namaFile);
        User::where('id', '=', Auth::user()->id)->update(['foto_profil' => $namaFile]);
        return redirect()->back()->with('message', 'foto Berhasil diperbarui');
    }

    public function update_pass(Request $request)
    {


       User::where('id', '=', Auth::user()->id)->update(["password" => bcrypt($request->password)]);
       
        return redirect()->back()->with('message', ' Berhasil diperbarui');
    }
    
    

  
}
