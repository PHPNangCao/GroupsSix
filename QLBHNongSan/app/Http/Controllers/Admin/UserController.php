<?php

namespace App\Http\Controllers\Admin;

use App\Admin\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserModel::orderBy('id', 'DESC')->get();
        return view('api-admin.modules.user.index',['LoaiNguoiDung' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loainguoidung = DB::table('loainguoidung')->get();
        return view('api-admin.modules.user.create',['loainguoidung'=>$loainguoidung]);
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
            'name'              => 'required',
            'email'             => 'required|unique:User',
            'password'          => 'required',
            'loainguoidung_id'  => 'required'
        ],[
            'name.required'                => 'Vui lòng nhập tên',
            'email.required'               => 'Vui lòng nhập Email',
            'email.unique'                 => 'Tên Email đã tồn tại',
            'password.required'            => 'Vui lòng nhập mật khẩu',
            'loainguoidung_id.required'    => 'Vui lòng chọn loại người dùng',
        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        $data['password'] = bcrypt($request->password);

        DB::table('user')->insert($data);

        return redirect()->route('admin.user.index');
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
        $loainguoidung = DB::table('LoaiNguoiDung')->get();
        $nguoidung = DB::table('user')->where('id',$id)->first();
        return view('api-admin.modules.user.edit',['nguoidung'=>$nguoidung],['loainguoidung'=>$loainguoidung]);
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
            'email'             => 'required',
            'password'          => 'required',
            'loainguoidung_id'  => 'required'
        ],[
            'email.required'               => 'Vui lòng nhập Email',
            'password.required'            => 'Vui lòng nhập mật khẩu',
            'loainguoidung_id.required'    => 'Vui lòng chọn loại người dùng',
        ]);

        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;

        $data['password'] = bcrypt($request->password);

        DB::table('user')->where('id',$id)->update($data);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user')->where('id',$id)->delete();
        return redirect()->route('admin.user.index');
    }
}
