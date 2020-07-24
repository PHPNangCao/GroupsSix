@extends('api-admin.master')
@section('title','Sửa người dùng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa người dùng</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.user.update',['id' => $nguoidung->id])}}" method="POST">
            @csrf
            <div class="form-product">
                <label>Ten</label>
                <input type="text" name="name" class="form-control" placeholder="Name..." value="{{$nguoidung->name}}">
            </div>
            <div class="form-product">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email..." value="{{$nguoidung->email}}">
                @if ($errors->has('email'))
                <div class="text-danger">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="form-product">
                <label>Mật khẩu</label>
                <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu" value="{{$nguoidung->password}}">
                @if ($errors->has('password'))
                <div class="text-danger">
                    {{$errors->first('password')}}
                </div>
                @endif
            </div>
            <div class="form-product">
                <label>Loại người dùng <span class="text-danger">(*)</label>
                    <select name="loainguoidung_id" class="form-control">
                        <option value="">----Chọn loại người dùng----</option>
                        @foreach($loainguoidung as $loaind)
                        <option value="{{ $loaind->id }}" selected = "{{ $nguoidung->loainguoidung_id }}">{{ $loaind->ten }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('loainguoidung_id'))
                            <div class="text-danger">
                                {{$errors->first('loainguoidung_id')}}
                            </div>
                    @endif
            </div>
            <br>
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
