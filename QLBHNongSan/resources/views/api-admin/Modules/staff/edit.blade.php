@extends('api-admin.master')
@section('title','Sửa thông tin nhân viên')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa thông tin nhân viên</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.staff.update',['id' => $nhanvien->id])}}" method="POST">
            @csrf
            <form action="{{route('admin.staff.store')}}" method="POST" >
                @csrf
                
                <div class="form-group">
                    <label>Tên nhân viên</label>
                    <input type="text" name="ten" class="form-control" placeholder="Tên nhân viên" value="{{$nhanvien->ten}}">
                    @if ($errors->has('ten'))
                    <div class="text-danger">
                        {{$errors->first('ten')}}
                    </div>
                    @endif
                </div>
    
                <div class="form-group">
                    <label>CMND</label>
                <input type="integer" name="cmnd" class="form-control" placeholder="CMND" value="{{$nhanvien->cmnd}}">
                    @if ($errors->has('cmnd'))
                    <div class="text-danger">
                        {{$errors->first('cmnd')}}
                    </div>
                    @endif
                </div>
    
                <div class="form-group">
                    <label>Số điện thoại </label>
                    <input type="number" name="sdt" class="form-control" placeholder="Số điện thoại" value="{{$nhanvien->sdt}}"> 
                    @if ($errors->has('sdt'))
                    <div class="text-danger">
                        {{$errors->first('sdt')}}
                    </div>
                    @endif
                </div>
    
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachi" class="form-control" placeholder="Địa Chỉ" value="{{$nhanvien->diachi}}">
                    @if ($errors->has('diachi'))
                    <div class="text-danger">
                        {{$errors->first('diachi')}}
                    </div>
                    @endif
                </div>
    
                <div class="form-group">
                    <label>Email Đăng Nhập</label>
                    <select name="user_id" class="form-control">
                        <option value="">---- Email Nhân Viên ----</option>
                            @foreach ($User as $us)
                                <option value="{{$us->id}}" selected = "{{$nhanvien->user_id}}">{{ $us->email}}</option>
                            @endforeach
                        </select>
                    @if ($errors->has('user_id'))
                    <div class="text-danger">
                        {{$errors->first('user_id')}}
                    </div>
                    @endif
                </div>
                <hr>
                <a href="{{route('admin.staff.index')}}" class="btn btn-warning">Quay Lại</a>
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