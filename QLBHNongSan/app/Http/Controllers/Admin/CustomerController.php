<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB, DateTime;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('khachhang')->orderBy('id', 'DESC')->get();
        return view('api-admin.modules.customer.index', ['khachhang' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khachhang = DB::table('khachhang')->get();
        return view('api-admin.modules.customer.create',['khachhang' => $khachhang]);
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
            'ten' => 'required|unique:KhachHang',
            'email' => 'required', 
            'sdt' => 'required',
            'diachi' => 'required',
            'matkhau' => 'required',

        ],[
            'ten.required' => 'Vui lòng nhập tên khách hàng',
            'ten.unique' => 'Tên khách hàng này đã tồn tại',
            'sdt.required' => 'Vui lòng nhập số điện thoại',
            'diachi.required' => 'Vui lòng nhập địa chỉ',
            'matkhau.required' => 'Vui lòng nhập mật khẩu'

        ]);


        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        //$request->anh->store('images', 'public');

        DB::table('khachhang')->insert($data);



        return redirect()->route('admin.customer.index');
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
        $khachhang = DB::table('khachhang')->where('id',$id)->first();
        return view('api-admin.modules.customer.edit', ['khachhang' => $khachhang]);
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
            'ten'       => 'required',
            'email'     => 'required', 
            'sdt'       => 'required',
            'diachi'    => 'required',
            'matkhau'   => 'required',

        ],[
            'ten.required'      => 'Vui lòng nhập tên khách hàng',
        //    'ten.unique' => 'Tên khách hàng này đã tồn tại',
            'sdt.required'      => 'Vui lòng nhập số điện thoại',
            'diachi.required'   => 'Vui lòng nhập địa chỉ',
            'matkhau.required'  => 'Vui lòng nhập mật khẩu'

        ]);

        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;
        DB::table('khachhang')->where('id',$id)->update($data);
        return redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('khachhang')->where('id',$id)->delete();
        return redirect()->route('admin.customer.index');
    }
}
