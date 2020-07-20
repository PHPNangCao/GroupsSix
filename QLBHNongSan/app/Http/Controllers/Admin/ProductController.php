<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ProductModel;
use DateTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SanPham = DB::table('SanPham')->get();
        $data = ProductModel::orderBy('id', 'DESC')->get();
        return view('api-admin.modules.product.index', ['SanPham' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $DonViTinh = DB::table('DonViTinh')->get();
        $LoaiSanPham = DB::table('LoaiSanPham')->get();
        
        return view('api-admin.modules.product.create',['LoaiSanPham' => $LoaiSanPham],['DonViTinh' => $DonViTinh]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdidateData = $request->validate([
            'ten' => 'required|unique:SanPham',
            'donvitinh_id' => 'required',
            'loaisanpham_id' => 'required',
            'anh' => 'required',
            'mota' => 'required',

        ],[
            'ten.required' => 'Vui lòng nhập tên sản phẩm',
            'ten.unique' => 'Tên sản phẩm này đã tồn tại',
            'donvitinh_id.required' => 'Vui lòng chọn đơn vị tính',
            'loaisanpham_id.required' => 'Vui lòng chọn loại sản phẩm',
            'anh.required' => 'Vui lòng chọn ảnh',
            'mota.required' => 'Vui lòng nhập mô tả sản phẩm',

        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;

    //thêm ảnh
        $file = $request->anh;       
        $file->move('public/upload/product', $file->getClientOriginalName());
        $data["anh"] =  $file->getClientOriginalName();
    //
        DB::table('SanPham')->insert($data);
        return redirect()->route('admin.product.index');
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
        $DonViTinh = DB::table('DonViTinh')->get();
        $LoaiSanPham = DB::table('LoaiSanPham')->get();
        $SanPham = DB::table('SanPham')->where('id',$id)->first();
        return view('api-admin.modules.product.edit', ['LoaiSanPham' => $LoaiSanPham, 'DonViTinh' => $DonViTinh], ['SanPham' => $SanPham]);
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
        $valdidateData = $request->validate([
            'ten' => 'required|unique:SanPham',
            'donvitinh_id' => 'required',
            'loaisanpham_id' => 'required',
            'mota' => 'required',

        ],[
            'ten.required' => 'Vui lòng nhập tên sản phẩm',
            'ten.unique' => 'Tên sản phẩm này đã tồn tại',
            'donvitinh_id.required' => 'Vui lòng chọn đơn vị tính',
            'loaisanpham_id.required' => 'Vui lòng chọn loại sản phẩm',
            'mota.required' => 'Vui lòng nhập mô tả sản phẩm',
            
        ]);
        
        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;
        DB::table('SanPham')->where('id',$id)->update($data);
        return redirect()->route('admin.product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('SanPham')->where('id',$id)->delete();
        return redirect()->route('admin.product.index');

    }
}
