@extends('api-admin.master')
@section('title','Thêm mới lô đặt hàng')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm lô hàng sản phẩm</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.lot-order.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên Lô Hàng <span class="text-danger">(*)</label>
                <input type="text" name="ten" class="form-control" placeholder="Tên lô hàng sản phẩm">
                
                @if ($errors->has('ten'))
                <div class="error-text" style="color: red">
                    {{$errors->first('ten')}}
                </div>
                @endif 

            </div>
            <div class="form-group">
                <label>Sản phẩm <span class="text-danger">(*)</label> 
                <select name="sanpham_id" class="form-control">
                <option value="">----Chọn sản phẩm----</option>
                @foreach ($SanPham as $SP)
                    <option value="{{$SP->id}}">{{$SP->ten}}</option>
                @endforeach
                </select>
                @if ($errors->has('sanpham_id'))
                <div class="error-text" style="color: red">
                    {{$errors->first('sanpham_id')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Nhà Cung Cấp <span class="text-danger">(*)</label>
                <select name="nhacungcap_id" class="form-control">
                <option value="">----Chọn nhà cung cấp----</option>
                @foreach ($NhaCungCap as $NhaCC)
                    <option value="{{$NhaCC->id}}">{{$NhaCC->ten}}</option>
                @endforeach
                </select>
                @if ($errors->has('nhacungcap_id'))
                <div class="error-text" style="color: red">
                    {{$errors->first('nhacungcap_id')}}
                </div>
                @endif

            </div>
            <div class="form-group">
                <label>Ngày sử dụng <span class="text-danger">(*)</label>
                <input type="text" name="ngaysudung" class="form-control" placeholder="Ngày sử dụng">
                @if ($errors->has('ngaysudung'))
                <div class="error-text" style="color: red">
                    {{$errors->first('ngaysudung')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>GIá mua vào <span class="text-danger">(*)</label>
                <input type="text" name="giamuavao" class="form-control" placeholder="giá mua vào">
                @if ($errors->has('giamuavao'))
                <div class="error-text" style="color: red">
                    {{$errors->first('giamuavao')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>GIá bán ra <span class="text-danger">(*)</label>
                <input type="text" name="giabanra" class="form-control" placeholder="giá bán ra">
                @if ($errors->has('giabanra'))
                <div class="error-text" style="color: red">
                    {{$errors->first('giabanra')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Số Lượng Nhập <span class="text-danger">(*)</label>
                <input type="text" name="soluongnhap" class="form-control" placeholder="Số lượng nhập">
                @if ($errors->has('soluongnhap'))
                <div class="error-text" style="color: red">
                    {{$errors->first('soluongnhap')}}
                </div>
                @endif
            </div>
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