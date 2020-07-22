<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use DateTime;
class TransportController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('NhaVanChuyen')->orderBy('id', 'DESC')->get();
        return view('api-admin.modules.transport.index', ['NhaVanChuyen' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('api-admin.modules.transport.create');
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
            'ten'       => 'required|unique:NhaVanChuyen',
            'diachi'    => 'required', 
            'sdt'       => 'required',

        ],[
            'ten.required'      => 'Vui lòng nhập tên nhà vận chuyển',
            'ten.unique'        => 'Tên nhà vận chuyển này đã tồn tại',
            'diachi.required'   => 'Vui lòng nhập địa chỉ',
            'sdt.required'      => 'Vui lòng cnhập số điện thoại',
            

        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        //$request->anh->store('images', 'public');

        // //thêm ảnh
        // $file = $request->anh;      
        // $file->move('public/upload/category', $file->getClientOriginalName());
        // $data["anh"] =  $file->getClientOriginalName();


        DB::table('NhaVanChuyen')->insert($data);
        return redirect()->route('admin.transport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function status($id)
    // {
    //     $category = OrdersModel::find($id);
    //     $category->trangthai = ! $category->trangthai;
    //     $category->save();
    //     return redirect()->back();
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        $NhaVanChuyen = DB::table('NhaVanChuyen')->where('id',$id)->first();
        return view('api-admin.modules.Transport.edit', ['NhaVanChuyen' => $NhaVanChuyen]);
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
            'diachi'    => 'required', 
            'sdt'       => 'required',

        ],[
            'ten.required'      => 'Vui lòng nhập tên nhà vận chuyển',
           // 'ten.unique' => 'Tên nhà vận chuyển này đã tồn tại',
            'diachi.required'   => 'Vui lòng nhập địa chỉ',
            'sdt.required'      => 'Vui lòng cnhập số điện thoại',
            

        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        //$request->anh->store('images', 'public');

        // //thêm ảnh
        // $file = $request->anh;      
        // $file->move('public/upload/category', $file->getClientOriginalName());
        // $data["anh"] =  $file->getClientOriginalName();


        DB::table('NhaVanChuyen')->where('id', $id)->update($data);
        return redirect()->route('admin.transport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('NhaVanChuyen')->where('id',$id)->delete();
        return redirect()->route('admin.transport.index');
    }
}
