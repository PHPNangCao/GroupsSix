<?php

namespace App\Http\Controllers\TrangChu;

use App\Admin\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeadController extends Controller
{
    public function head(){
        $data = DB::table('LoaiSanPham')->orderBy('id', 'DESC')->get();
        return view('page.TrangChu.block.master', ['LoaiSanPham' => $data]);
    }
}
