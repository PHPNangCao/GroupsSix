@extends('api-admin.master')
@section('title','Thêm nhân viên')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm thông tin nhân viên</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.staff.store')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Tên nhân viên</label>
                <input type="text" name="ten" class="form-control" placeholder="Tên nhân viên">
                @if ($errors->has('ten'))
                <div class="text-danger">
                    {{$errors->first('ten')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>CMND</label>
                <input type="integer" name="cmnd" class="form-control" placeholder="CMND">
                @if ($errors->has('cmnd'))
                <div class="text-danger">
                    {{$errors->first('cmnd')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Số điện thoại </label>
                <input type="integer" name="sdt" class="form-control" placeholder="Số điện thoại">
                @if ($errors->has('sdt'))
                <div class="text-danger">
                    {{$errors->first('sdt')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="diachi" class="form-control" placeholder="Địa Chỉ">
                @if ($errors->has('diachi'))
                <div class="text-danger">
                    {{$errors->first('diachi')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Mã Số Nhân Viên</label>
                <select name="user_id" class="form-control">
                    <option value="">---- Mã Số Nhân Viên ----</option>
                    @foreach ($loainguoidung as $loaind)
                    <option value="{{$loaind->id}}">{{$loaind->ten}}</option>
                    @endforeach
                    </select>
                @if ($errors->has('user_id'))
                <div class="text-danger">
                    {{$errors->first('user_id')}}
                </div>
                @endif
            </div>

            <hr>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection