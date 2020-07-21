<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('NhomSanPham')->orderBy('id', 'DESC')->get();
        return view('api-admin.modules.group.index', ['NhomSanPham' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('api-admin.modules.group.create');
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
            'ten' => 'required|unique:NhomSanPham',
            'anh' => 'required',
            'mota' => 'required',

        ],[
            'ten.required' => 'Vui lòng nhập tên sản phẩm',
            'ten.unique' => 'Tên sản phẩm này đã tồn tại',
            'anh.required' => 'Vui lòng chọn ảnh',
            'mota.required' => 'Vui lòng nhập mô tả sản phẩm',

        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;

            //thêm ảnh
            $file = $request->anh;       
            $file->move('public/upload/groups', $file->getClientOriginalName());
            $data["anh"] =  $file->getClientOriginalName();
        //

        DB::table('NhomSanPham')->insert($data);
        return redirect()->route('admin.group.index');
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
        $NhomSanPham = DB::table('NhomSanPham')->where('id',$id)->first();
        return view('api-admin.modules.group.edit', ['NhomSanPham' => $NhomSanPham]);
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
            $request->anh->move('public/upload/groups', $image_name);
        }else{
            $image_name = $request->image;
        }
        DB::table('NhomSanPham')->where('id',$id)->update([
            'ten' => $request->ten,
            'mota' => $request->mota,
            'anh' => $image_name,
        ]);
        return redirect()->route('admin.group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('NhomSanPham')->where('id',$id)->delete();
        return redirect()->route('admin.group.index');
    }
}
