@extends('api-admin.master')
@section('title','Thêm loại khách hàng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm thông tin khách hàng</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.customer.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="text" name="ten" class="form-control" placeholder="Tên khách hàng">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Số điện thoại </label>
                <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="diachi" class="form-control" placeholder="Địa Chỉ">
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="password" name="matkhau" class="form-control" placeholder="Mật Khẩu">
            </div>
            {{-- <div class="form-group">
                <label>Nhóm sản phẩm</label>
                <select name="nhom_id" class="form-control">
                <option >----Chọn nhóm sản phẩm----</option>

                @foreach ($khachhang as $kh)
                    <option value="{{$kh->id}}">{{$kh->ten}}</option>
                @endforeach

                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>

@endsection