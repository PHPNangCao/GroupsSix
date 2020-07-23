<?php

namespace App\Http\Controllers\Admin;

use App\Admin\MonNgonModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB,DateTime;
class MonNgonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MonNgonModel::orderBy('id', 'DESC')->get();
        return view('api-admin.modules.monngon.index',['monngon'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sanpham = DB::table('sanpham')->get();
        return view('api-admin.modules.monngon.create',['sanpham'=>$sanpham]);
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
                'tieude' => 'required|unique:monngon',
                'tomtat' => 'required',
                'noidung' => 'required',
                'anh' => 'required',
                'luotxem' => 'defual',
                'sanpham_id' => 'required',

            ],[
                'tieude.required' => 'Vui lòng nhập tiêu đề',
                'tomtat.required' => 'Vui lòng chọn tóm tắt',
                'anh.required' => 'Vui lòng chọn ảnh',
                'sanpham_id' => 'Vui lòng chọn Loại Sản phẩm',

            ]);

            $data = $request->except('_token');

            $file = $request->anh;
            $file->move('public/upload/monngon', $file->getClientOriginalName());
            $data["anh"] =  $file->getClientOriginalName();

            $data['created_at'] = new DateTime;
            $data['updated_at'] = new DateTime;

            DB::table('monngon')->insert($data);
            return redirect()->route('admin.monngon.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $monngon = MonNgonModel::find($id);
        $monngon->trangthai = ! $monngon->trangthai;
        $monngon->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monngon = DB::table('monngon')->where('id',$id)->first();
        $sanpham = DB::table('sanpham')->get();
        return view('api-admin.modules.monngon.edit',['monngon'=>$monngon],['SanPham'=>$sanpham]);
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
        if($request->has('anh')){
            $image_name = $request->anh->getClientOriginalName();
            $request->anh->move('public/upload/monngon', $image_name);
        }else{
            $image_name = $request->image;
        }

        $addimage = DB::table('MonNgon')->where('id',$id)->update([
            'tieude' => $request->tieude,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'anh' => $image_name,
            'sanpham_id' => $request->sanpham_id,
            'trangthai' => $request->trangthai

        ]);

        if($addimage){
            return redirect()->route('admin.monngon.index')->with('Sửa thành công bảng sản phẩm');
        }
            return redirect()->route('admin.monngon.index')->with('Sửa không thành công bảng sản phẩm');

        // $data = $request->except('_token');
        // $data['updated_at'] = new DateTime;

        // DB::table('monngon')->where('id',$id)->update($data);
        // return redirect()->route('admin.monngon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('monngon')->where('id',$id)->delete();
        return redirect()->route('admin.monngon.index');
    }
}
