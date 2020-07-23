<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showViewLogin(){
        return view('api-admin.modules.login.login');
    }

    public function progressLogin(Request $request){
        $credentials = request()->only('email', 'matkhau');

        //if (Auth::attempt($credentials)){
            return redirect()->route('admin.monngon.index');
        //} else {
        //    return redirect()->route('showViewLogin');
        //}
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('showViewLogin');
    }
}
