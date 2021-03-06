<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;


class KindOfUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('loainguoidung')->orderBy('id', 'DESC')->get();
        return view('api-admin.modules.kindofuser.index', ['loainguoidung' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loainguoidung = DB::table('loainguoidung')->get();
        return view('api-admin.modules.kindofuser.create',['loainguoidung' => $loainguoidung]);
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
            'ten' => 'required|unique:LoaiNguoiDung',
            'mota' => 'required',

        ],[
            'ten.required' => 'Vui lòng nhập loại người dùng',
            'ten.unique' => 'Loại người dùng này đã tồn tại',
            'mota.required' => 'Vui lòng nhập mô tả loại người dùng',

        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;

        DB::table('loainguoidung')->insert($data);
        
        return redirect()->route('admin.kindofuser.index');
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
        $loainguoidung = DB::table('loainguoidung')->where('id',$id)->first();
        return view('api-admin.modules.kindofuser.edit', ['loainguoidung' => $loainguoidung]);
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
        DB::table('loainguoidung')->where('id',$id)->update($data);
        return redirect()->route('admin.kindofuser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('loainguoidung')->where('id',$id)->delete();
        return redirect()->route('admin.kindofuser.index');
    }
}
