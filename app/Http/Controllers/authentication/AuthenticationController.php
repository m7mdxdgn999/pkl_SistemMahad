<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function Index()
    {
        return view('authentication.login');
    }

    public function Login(Request $request)
    {
        //cek apakah sudah tertangkap via id
        //    dd($request->all());
        // cara manual #1
        // $data=User::where ('email',$request->email)->firstOrfail();
        // if ($data) {
        //     if (Hash::check($request->password,$data->password)) {
        //         session(['berhasil_login'=>true]);
        //         return redirect()->route('index');
        //     }
        // }

        // cara yg disedian laravel
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            # code...
             return redirect()->route('index'); 
         }
        
        return redirect()->route('p.login')->with('message','Email atau Password salah');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        // $request->session()->flush();
        return redirect()->route('p.login');
    }
}
