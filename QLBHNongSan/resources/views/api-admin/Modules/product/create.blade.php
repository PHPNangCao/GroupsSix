@extends('api-admin.master')
@section('title','Thêm sản phẩm')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.product.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-product">
                <label>Tên sản phẩm</label>
                <input type="text" name="ten" class="form-control" required  placeholder="Tên sản phẩm">
            </div>
            <div class="form-product">
                <label>Mô tả</label>
                <textarea class="form-control" name="mota" rows="3" required placeholder="Mô tả"></textarea>
            </div>
            <div class="form-product">
                <label>Ảnh</label>
                <input type="file" class="form-control-file" required name="anh">
              </div>
            
              <div class="form-group">
                <label>Đơn vị tính</label>
                <select name="donvitinh_id" class="form-control">
                <option >----Chọn đơn vị tính----</option>
                @foreach ($DonViTinh as $DVT)
                    <option value="{{$DVT->id}}">{{$DVT->ten}}</option>
                @endforeach
                </select>
            </div>

              <div class="form-group">
                <label>Loại sản phẩm</label>
                <select name="loaisanpham_id" class="form-control">
                <option >----Chọn loại sản phẩm----</option>
                @foreach ($LoaiSanPham as $LoaiSP)
                    <option value="{{$LoaiSP->id}}">{{$LoaiSP->ten}}</option>
                @endforeach
                </select>
            </div>

            {{-- <div class="form-group">
                <label>Trạng Thái <label>
                    <select name="trangthai" class="form-control">
                          <option value="1"  selected> Còn Hàng</option>
                          <option value="0"  > Hết Hàng</option>
                    </select>
            </div> --}}
            
              <hr>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        
    </div>
    <!-- /.card-footer-->
</div>

@endsection