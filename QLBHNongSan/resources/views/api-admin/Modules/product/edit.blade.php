@extends('api-admin.master')
@section('title','Sửa thông tin sản phẩm')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.product.update',['id' => $SanPham->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Tên sản phẩm <span class="text-danger">(*)</label>
                    <input type="text" name="ten" class="form-control" placeholder="Tên sản phẩm" value="{{$SanPham->ten}}">
                    </div>
                    <div class="form-group">
                        <label>Mô tả <span class="text-danger">(*)</label>
                    <textarea class="form-control" name="mota" rows="2" placeholder="Mô tả">{{$SanPham->mota}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh <span class="text-danger">(*)</label>
                        <input type="hidden" name="image" value="{{$SanPham->anh}}">
                        <input type="file" class="form-control-file" name="anh">
                    </div>              
                      <hr>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </div>

                <div class="col-md-4"> 
                    <div class="form-group">
                        <label>Đơn vị tính <span class="text-danger">(*)</label>
                        <select name="donvitinh_id" class="form-control">
                        <option >----Chọn đơn vị tính----</option>
                        @foreach ($DonViTinh as $DVT)
                            <option value="{{$DVT->id}}" selected = {{$SanPham->donvitinh_id}}>{{$DVT->ten}}</option>
                        @endforeach
                        </select>
                    </div>
                <input type="hidden" name="trangthai" value="{{$SanPham->trangthai}}">
                    <div class="form-group">
                        <label>Loại sản phẩm <span class="text-danger">(*)</label>
                        <select name="loaisanpham_id" class="form-control">
                        <option >----Chọn loại sản phẩm----</option>
                        @foreach ($LoaiSanPham as $LoaiSP)
                            <option value="{{$LoaiSP->id}}" selected = {{$SanPham->loaisanpham_id}}>{{$LoaiSP->ten}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ảnh đã lưu</label>
                            <a href="#" class="thumbnail">
                                <img src="public/upload/product/{{$SanPham->anh}}" alt="" height="100px">
                            </a>
                        </div>
                    </div>
                  </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        
    </div>
    <!-- /.card-footer-->
</div>

@endsection