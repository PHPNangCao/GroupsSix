<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Admin\LotOrderModel;
use Illuminate\Support\Arr;

class LotOrđerController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $SanPham = DB::table('SanPham')->get();
        $data = LotOrderModel::orderBy('id', 'DESC')->get();
    
        return view('api-admin.modules.Lot_Order.index', ['LoHang' => $data],['SanPham' => $SanPham]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $SanPham = DB::table('SanPham')->get();
        $NhaCungCap = DB::table('NhaCungCap')->get();
        return view('api-admin.modules.Lot_Order.create',['SanPham' => $SanPham], ['NhaCungCap' => $NhaCungCap]);
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
            'ten' => 'required|unique:LoHang',
            'sanpham_id' => 'required',
            'nhacungcap_id' => 'required',
            'ngaysudung' => 'required',
            'giamuavao' => 'required',
            'giabanra' => 'required',
            'soluongnhap' => 'required',


        ],[
            'ten.required' => 'Vui lòng nhập tên lô hàng',
            'ten.unique' => 'Tên lô hàng này đã tồn tại',
            'sanpham_id.required' => 'Vui lòng chọn loại sản phẩm',
            'nhacungcap_id.required' => 'Vui lòng chọn nhà cung cấp',
            'ngaysudung.required' => 'Vui lòng nhập ngày sử dụng',
            'giamuavao.required' => 'Vui lòng nhập giá mua vào',
            'giabanra.required' => 'Vui lòng nhập giá bán ra',
            'soluongnhap.required' => 'Vui lòng nhập số lượng',
        ]);


        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        DB::table('LoHang')->insert($data);
        return redirect()->route('admin.lot-order.index');
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
        $SanPham = DB::table('SanPham')->get();
        $NhaCungCap = DB::table('NhaCungCap')->get();
        $LoHang = DB::table('LoHang')->where('id',$id)->first();
        return view('api-admin.modules.Lot_Order.edit', ['LoHang' => $LoHang],['SanPham' => $SanPham, 'NhaCungCap' => $NhaCungCap]);
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
            'ten' => 'required|unique:LoHang',
            'sanpham_id' => 'required',
            'nhacungcap_id' => 'required',
            'ngaysudung' => 'required',
            'giamuavao' => 'required',
            'giabanra' => 'required',
            'soluongnhap' => 'required',


        ],[
            'ten.required' => 'Vui lòng nhập tên lô hàng',
            'ten.unique' => 'Tên lô hàng này đã tồn tại',
            'sanpham_id.required' => 'Vui lòng chọn loại sản phẩm',
            'nhacungcap_id.required' => 'Vui lòng chọn nhà cung cấp',
            'ngaysudung.required' => 'Vui lòng nhập ngày sử dụng',
            'giamuavao.required' => 'Vui lòng nhập giá mua vào',
            'giabanra.required' => 'Vui lòng nhập giá bán ra',
            'soluongnhap.required' => 'Vui lòng nhập số lượng',
        ]);


        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;
        DB::table('LoHang')->where('id',$id)->update($data);
        return redirect()->route('admin.lot-order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('LoHang')->where('id',$id)->delete();
        return redirect()->route('admin.lot-order.index');
    }
}
