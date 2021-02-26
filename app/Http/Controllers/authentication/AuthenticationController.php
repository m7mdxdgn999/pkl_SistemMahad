<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
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
        $data=User::where ('email',$request->email)->firstOrfail();
        if ($data) {
            if (Hash::check($request->password,$data->password)) {
                session(['berhasil_login'=>true]);
                return redirect()->route('index');
            }
        }
        return redirect('/')->with('message','Email atau Password salah');
    }

    public function Logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('p.login');
    }
}
