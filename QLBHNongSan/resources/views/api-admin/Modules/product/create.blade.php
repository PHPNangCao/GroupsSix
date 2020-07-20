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
            <div class="row">
                <div class="col-md-8">

                    <div class="form-group">
                        <label>Tên sản phẩm <span class="text-danger">(*)</span></label>
                        <input type="text" name="ten" class="form-control"   placeholder="Tên sản phẩm">
                        @if ($errors->has('ten'))
                        <div class="text-danger">
                            {{$errors->first('ten')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="mota" rows="3"  placeholder="Mô tả"></textarea>
                        @if ($errors->has('mota'))
                        <div class="text-danger">
                            {{$errors->first('mota')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" class="form-control-file"  name="anh">
                        @if ($errors->has('anh'))
                        <div class="text-danger">
                            {{$errors->first('anh')}}
                        </div>
                        @endif
                    </div>
                    
                      <hr>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Đơn vị tính</label>
                        <select name="donvitinh_id" class="form-control">
                        <option value="">----Chọn đơn vị tính----</option>
                        @foreach ($DonViTinh as $DVT)
                        <option value="{{$DVT->id}}">{{$DVT->ten}}</option>
                        @endforeach
                        </select>
        
                        @if ($errors->has('donvitinh_id'))
                        <div class="text-danger">
                            {{$errors->first('donvitinh_id')}}
                        </div>
                        @endif
                    </div>
        
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select name="loaisanpham_id" class="form-control">
                        <option value="">----Chọn loại sản phẩm----</option>
                        @foreach ($LoaiSanPham as $LoaiSP)
                            <option value="{{$LoaiSP->id}}">{{$LoaiSP->ten}}</option>
                        @endforeach
                        </select>
                        
                        @if ($errors->has('loaisanpham_id'))
                        <div class="text-danger">
                            {{$errors->first('loaisanpham_id')}}
                        </div>
                        @endif
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