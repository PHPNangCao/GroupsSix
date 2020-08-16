<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    function page(){
        $data = DB::table('SanPham')->orderBy('id', 'DESC')->get();
        return view('page.TrangChu.Modules.trang-chu',['SanPham'=> $data]);
    }
    
    function dangki(){
        return view('page.TrangChu.Modules.dang-ki');
    }

    function xulydangki(){
       
    }

    function sanpham(){
        return view('page.TrangChu.Modules.san-pham');

    }


    function tintuc(){
        return view('page.TrangChu.Modules.tin-tuc');

    }

    function khuyenmai(){
        return view('page.TrangChu.Modules.khuyen-mai');
        
    }

    function monngon(){
        return view('page.TrangChu.Modules.mon-ngon');
        
    }

    function lienhe(){
        return view('page.TrangChu.Modules.lien-he');
        
    }

}
