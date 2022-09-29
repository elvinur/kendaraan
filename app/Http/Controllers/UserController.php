<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('loginpegawai.login');
    }

    public function ProsesLogin(Request $request){
        // dd(Hash::make($request->password));
        // dd($request->all());
        if(Auth::guard('pegawai')->attempt(['nip'=>$request->nip, 'password'=>$request->password])){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back();
        }

    }

    public function logout(Request $request){
        Auth::guard('pegawai')->logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login.pegawai');
      
    }

}
