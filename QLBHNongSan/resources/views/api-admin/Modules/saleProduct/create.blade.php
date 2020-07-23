@extends('api-admin.master')
@section('title','Thêm thông tin sản phẩm khuyến mãi')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.saleproduct.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Thông tin khuyến mãi</label>
                <input type="text" class="form-control-file" name="mota">
                @if ($errors->has('mota'))
                <div class="text-danger">
                    {{$errors->first('mota')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Khuyến mãi ID</label>
                <select name="khuyenmai_id" class="form-control">
                <option >----Chọn nhà khuyến mãi----</option>
                @foreach ($khuyenmai as $km)
                    <option value="{{$km->id}}">{{$km->tieude}}</option>
                @endforeach
                </select>
                @if ($errors->has('khuyenmai_id'))
                <div class="text-danger">
                    {{$errors->first('khuyenmai_id')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Sản phẩm</label>
                <select name="sanpham_id" class="form-control">
                <option >----Chọn sản phẩm----</option>
                @foreach ($SanPham as $SP)
                    <option value="{{$SP->id}}">{{$SP->ten}}</option>
                @endforeach
                </select>
                @if ($errors->has('sanpham_id'))
                <div class="text-danger">
                    {{$errors->first('sanpham_id')}}
                </div>
                @endif
            </div>
            <a href="{{route('admin.saleproduct.index')}}" class="btn btn-warning">Quay Lại</a>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection
