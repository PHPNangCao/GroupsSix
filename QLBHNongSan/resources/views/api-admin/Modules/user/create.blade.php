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
                <label>Email <span class="text-danger">(*)</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                <div class="text-danger">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="form-product">
                <label>Mật khẩu <span class="text-danger">(*)</label>
                <input type="password" class="form-control" name="matkhau" placeholder="Nhập mật khẩu">
                @if ($errors->has('matkhau'))
                        <div class="text-danger">
                            {{$errors->first('matkhau')}}
                        </div>
                @endif
            </div>
            <div class="form-product">
                <label>Loại người dùng <span class="text-danger">(*)</label>
                <select name="loainguoidung_id" class="form-control">
                    <option value="">----Chọn loại người dùng----</option>
                    @foreach($loainguoidung as $loaind)
                    <option value="{{ $loaind->id }}">{{ $loaind->ten }}</option>
                    @endforeach
                </select>
                @if ($errors->has('loainguoidung_id'))
                        <div class="text-danger">
                            {{$errors->first('loainguoidung_id')}}
                        </div>
                @endif
            </div>
            <hr>
            <a href="{{route('admin.user.index')}}" class="btn btn-warning">Quay Lại</a>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection