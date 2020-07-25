@extends('api-admin.master')
@section('title','Sửa thông tin tuyển dụng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa thông tin tuyển dụng</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.recruitment.update',['id' => $TuyenDung->id])}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label>Tiêu Đề</label>
            <input type="text" class="form-control-file"  name="tieude" placeholder="Tiêu đề" value="{{$TuyenDung->tieude}}">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="hidden" name="image" value="{{$TuyenDung->anh}}">
                <input type="file" class="form-control-file"  name="anh">
            </div>
            <div class="form-group">
                <label>Tình trạng</label>
                <select name="tinhtrang" class="form-control">
                    <option value="1">Đang còn tuyển</option>
                    <option value="0">Tạm ngừng tuyển</option>
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="mota" rows="3"  placeholder="Mô tả">{{$TuyenDung->mota}}</textarea>
                <script>
                    CKEDITOR.replace('mota');
                </script>
            </div>
            <div class="form-group">
                <label>Liên hệ</label>
                <input type="text" class="form-control-file" name="lienhe" placeholder="Số điện thoại" value="{{$TuyenDung->lienhe}}">
            </div>
            <a href="{{route('admin.recruitment.index')}}" class="btn btn-warning">Quay Lại</a>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>

@endsection