@extends('api-admin.master')
@section('title','Thêm người dùng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm thông tin người dùng</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.user.store')}}" method="POST">
            @csrf
            <div class="form-product">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Tên email hoặc người dùng">
            </div>
            <div class="form-product">
                <label>Mật khẩu</label>
                <input type="text" class="form-control" name="pass" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-product">
                <label>Loại người dùng</label>
                <select name="loainguoidung_id" class="form-control">
                    <option > ----Chọn loại người dùng----</option>
                    @foreach($loainguoidung as $loaind)
                    <option value="{{ $loaind->id }}">{{ $loaind->ten }}</option>
                    @endforeach
                </select>
              </div>
            <br>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection