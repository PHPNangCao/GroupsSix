<?php

namespace App\Http\Controllers\Admin;

use App\Admin\RecruitmentModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB, DateTime;
use  Illuminate\Support\Str;
class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('TuyenDung')->orderBy('id', 'DESC')->get();
        return view('api-admin.modules.recruitment.index', ['TuyenDung' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TuyenDung = DB::table('TuyenDung')->get();
        return view('api-admin.modules.recruitment.create',['TuyenDung' => $TuyenDung]);
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
        $file->move('public/upload/tuyendung', $file->getClientOriginalName());
        $data["anh"] =  $file->getClientOriginalName();
//
        DB::table('TuyenDung')->insert($data);

        return redirect()->route('admin.recruitment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $td = RecruitmentModel::find($id);
        $td->tinhtrang = ! $td->tinhtrang;
        $td->save();
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
        $TuyenDung = DB::table('TuyenDung')->where('id',$id)->first();
        return view('api-admin.modules.recruitment.edit', ['TuyenDung' => $TuyenDung]);
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
            $request->anh->move('public/upload/tuyendung', $image_name);
        }else{
            $image_name = $request->image;
        }
        $url = Str::slug($request->tieude, '-');
        DB::table('TuyenDung')->where('id',$id)->update([
        'tieude' => $request->tieude,
        'url'   => $url,
        'anh' => $image_name,
        'mota' => $request->mota,
        'lienhe' => $request->lienhe,
        'tinhtrang' => $request->tinhtrang,
        
        ]);
        return redirect()->route('admin.recruitment.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('TuyenDung')->where('id',$id)->delete();
        return redirect()->route('admin.recruitment.index');
    }
}
