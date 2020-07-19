<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NhomSanPham = DB::table('NhomSanPham')->get();
        $data = DB::table('LoaiSanPham')->orderBy('id', 'DESC')->get();
        return view('api-admin.modules.category.index', ['LoaiSanPham' => $data], );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $NhomSanPham = DB::table('NhomSanPham')->get();
        return view('api-admin.modules.category.create',['NhomSanPham' => $NhomSanPham]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        //$request->anh->store('images', 'public');


        //thêm ảnh
        $file = $request->anh;      
        $file->move('public/upload/category', $file->getClientOriginalName());
        $data["anh"] =  $file->getClientOriginalName();


        DB::table('LoaiSanPham')->insert($data);

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $NhomSanPham = DB::table('NhomSanPham')->get();
        $LoaiSanPham = DB::table('LoaiSanPham')->where('id',$id)->first();
        return view('api-admin.modules.category.edit', ['LoaiSanPham' => $LoaiSanPham], ['NhomSanPham' => $NhomSanPham]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->except('_token');
        // $data['updated_at'] = new DateTime;

        // if($request->has('anh')){
        //     //thêm ảnh
        //     $file = $request->anh;  
        //     $file->move('public/upload/category', $file->getClientOriginalName());
        //     $data["anh"] =  $file->getClientOriginalName();
        // }else{
        //     $data["anh"] = $request->anh;
        // }
        //  DB::table('LoaiSanPham')->where('id',$id)->update($data);
        if($request->has('anh')){
            $image_name = $request->anh->getClientOriginalName();
            $request->anh->move(public_path('public/upload/category'),$image_name);
        }else{
            $image_name = $request->image;
        }
        $addimage = DB::table('LoaiSanPham')->where('id',$id)->update([
            'ten' => $request->ten,
            'mota' => $request->mota,
            'anh' => $image_name,
            'nhom_id' => $request->nhom_id,
            'trangthai' => $request->trangthai
        ]);
        if($addimage){
            return redirect()->route('admin.category.index')->with('Sửa thành công bảng loại sản phẩm');
        }
        return redirect()->route('admin.category.index')->with('Sửa không thành công bảng loại sản phẩm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('LoaiSanPham')->where('id',$id)->delete();
        return redirect()->route('admin.category.index');
    }
}
