@extends('api-admin.master')
@section('title','Thêm nhà vận chuyển')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm nhà vận chuyển</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.transport.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên nhà vận chuyển <span class="text-danger">(*)</span></label>
                <input type="text" name="ten" class="form-control" placeholder="Tên nhà cung cấp">
                @if ($errors->has('ten'))
                        <div class="text-danger">
                            {{$errors->first('ten')}}
                        </div>
                @endif
            </div>
            <div class="form-group">
                <label>Địa chỉ <span class="text-danger">(*)</span></label>
                <input type="text" name="diachi" class="form-control" placeholder="Địa chỉ">
                @if ($errors->has('diachi'))
                        <div class="text-danger">
                            {{$errors->first('diachi')}}
                        </div>
                @endif
            </div>
            <div class="form-group">
                <label>Số điện thoại <span class="text-danger">(*)</span></label>
                <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại">
                @if ($errors->has('sdt'))
                        <div class="text-danger">
                            {{$errors->first('sdt')}}
                        </div>
                @endif
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="mota" rows="3"  placeholder="Mô tả"></textarea>
            </div>
        <a href="{{route('admin.transport.index')}}" class="btn btn-warning">Quay lại</a>
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