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
                <label>Tên khách hàng <span class="text-danger">(*)</label>
                <input type="text" name="ten" class="form-control" placeholder="Tên khách hàng">
                @if ($errors->has('ten'))
                        <div class="text-danger">
                            {{$errors->first('ten')}}
                        </div>
                @endif
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">(*)</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                        <div class="text-danger">
                            {{$errors->first('email')}}
                        </div>
                @endif
            </div>
            <div class="form-group">
                <label>Số điện thoại <span class="text-danger">(*)</label>
                <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại">
                @if ($errors->has('sdt'))
                        <div class="text-danger">
                            {{$errors->first('sdt')}}
                        </div>
                @endif
            </div>
            <div class="form-group">
                <label>Địa chỉ <span class="text-danger">(*)</label>
                <input type="text" name="diachi" class="form-control" placeholder="Địa Chỉ">
                @if ($errors->has('diachi'))
                        <div class="text-danger">
                            {{$errors->first('diachi')}}
                        </div>
                @endif
            </div>
            <div class="form-group">
                <label>Mật Khẩu <span class="text-danger">(*)</label>
                <input type="text" name="matkhau" class="form-control" placeholder="Mật Khẩu">
                @if ($errors->has('matkhau'))
                        <div class="text-danger">
                            {{$errors->first('matkhau')}}
                        </div>
                @endif
            </div>

            
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