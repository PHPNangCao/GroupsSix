<?php

namespace App\Http\Controllers\Admin;

use App\Admin\PromotionalModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use DateTime;

class PromotionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quangcao = PromotionalModel::orderBy('id', 'DESC')->get();
        return view('api-admin.modules.promotional.index', ['quangcao' => $quangcao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khuyenmai = DB::table('KhuyenMai')->get();
        return view('api-admin.modules.promotional.create',['khuyenmai' => $khuyenmai]);
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
            'anh' => 'required',
            'khuyenmai_id' => 'required',
        ],[

            'khuyenmai_id.required' => 'Vui lòng chọn khuyến mãi',
            'anh.required' => 'Vui lòng chọn ảnh',

        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        //thêm ảnh
        $file = $request->anh;       
        $file->move('public/upload/quangcao', $file->getClientOriginalName());
        $data["anh"] =  $file->getClientOriginalName();
  
        DB::table('quangcao')->insert($data);
        return redirect()->route('admin.promotional.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $quangcao = PromotionalModel::find($id);
        $quangcao->trangthai = ! $quangcao->trangthai;
        $quangcao->save();
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
        $khuyenmai = DB::table('KhuyenMai')->get();
        $quangcao = DB::table('quangcao')->where('id',$id)->first();
        return view('api-admin.modules.promotional.edit', ['quangcao' => $quangcao],['khuyenmai' => $khuyenmai]);
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
            $request->anh->move('public/upload/quangcao', $image_name);
        }else{
            $image_name = $request->image;
        }
        DB::table('QuangCao')->where('id',$id)->update([
            'anh' => $image_name,
            'url' => $request->url,
            'trangthai' => $request->trangthai,
            'khuyenmai_id' => $request->khuyenmai_id,
        ]);
        return redirect()->route('admin.promotional.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('quangcao')->where('id',$id)->delete();
        return redirect()->route('admin.promotional.index');
    }
}
