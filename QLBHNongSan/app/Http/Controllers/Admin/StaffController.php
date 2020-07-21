<?php

namespace App\Http\Controllers\Admin;

use App\Admin\StaffModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StaffModel::orderBy('id', 'DESC')->get();
        return view('api-admin.modules.staff.index', ['nhanvien' => $data]);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('api-admin.modules.staff.create');
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
            'ten' => 'required|unique:NhanVien',
            'cmnd' => 'required|interger|max:12',
            'sdt' => 'required|interger|max:10',
            'diachi' => 'required',

        ],[
            'ten.required' => 'Vui lòng nhập tên nhân viên',
            'cmnd.required' => 'Vui lòng nhập số CMND',
            'cmnd.unique' => 'Số CMND này đã tồn tại',
            'cmnd.max' => 'Số CMND không quá được 12 số',
            'sdt.required' => 'Vui lòng nhập số số điện thoại',
            'diachi.required' => 'Vui lòng nhập địa chỉ',
        ]);
        

        $data = $request -> except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        
        DB::table('nhanvien')->insert($data);

        return redirect()->route('admin.staff.index');


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
        $DVT = DB::table('nhanvien')->where('id',$id)->first();
        return view('api-admin.modules.staff.edit', ['nhanvien' => $DVT]);
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
        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;
        DB::table('nhanvien')->where('id',$id)->update($data);
        return redirect()->route('admin.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('nhanvien')->where('id',$id)->delete();
        return redirect()->route('admin.staff.index');
    }
}
