<?php

namespace App\Http\Controllers\Admin;

use App\Admin\SaleModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB, DateTime;
use  Illuminate\Support\Str;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('KhuyenMai')->orderBy('id', 'DESC')->get();
        return view('api-admin.modules.sale.index', ['khuyenmai' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khuyenmai = DB::table('KhuyenMai')->get();
        return view('api-admin.modules.sale.create',['khuyenmai' => $khuyenmai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['url'] = Str::slug($data['tieude'], '-');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        //$request->anh->store('images', 'public');
    //thêm ảnh
    $file = $request->anh;

    $file->move('public/upload/sale', $file->getClientOriginalName());


    $data["anh"] =  $file->getClientOriginalName();
//

        DB::table('KhuyenMai')->insert($data);

        return redirect()->route('admin.sale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $km = SaleModel::find($id);
        $km->tinhtrang = ! $km->tinhtrang;
        $km->save();
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
        $khuyenmai = DB::table('KhuyenMai')->where('id',$id)->first();
        return view('api-admin.modules.sale.edit', ['khuyenmai' => $khuyenmai]);
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
            $request->anh->move('public/upload/sale', $image_name);
        }else{
            $image_name = $request->image;
        }
        $url = Str::slug($request->tieude, '-');
        DB::table('KhuyenMai')->where('id',$id)->update([
        'tieude' => $request->tieude,
        'url'   => $url,
        'noidung' => $request->noidung,
        'anh' => $image_name,
        'tinhtrang' => $request->tinhtrang,
        
        ]);
        return redirect()->route('admin.sale.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('KhuyenMai')->where('id',$id)->delete();
        return redirect()->route('admin.sale.index');
    }
}
