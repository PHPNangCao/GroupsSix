<?php

namespace App\Http\Controllers;

use App\Admin\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showViewLogin(){
        return view('api-admin.modules.login.login');
    }

    public function progressLogin(Request $request){

        $valdidateData = $request->validate([
            'email' => 'required',
            'password' => 'required', 

        ],[
            'email.required' => 'Vui lòng nhập Email',
            'password.required' => 'Vui lòng nhập mật khẩu',

        ]);

        $data = request()->only('email', 'password');
        $remember = $request->input('remember-me');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'loainguoidung_id' => 1], $remember)){
            return redirect()->route('admin');
        } else {
            return redirect()->route('showViewLogin');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('showViewLogin');
    }

    public function admin(){
        $data = ProductModel::get();
        $count['SanPham'] = DB::table('SanPham')->count();
        return view('api-admin.tongquan',['SanPham'  => $data, 'count'=>$count]);
    }
}
