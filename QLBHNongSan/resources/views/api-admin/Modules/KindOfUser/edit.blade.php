@extends('api-admin.master')
@section('title','Sửa thông tin loại người dùng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa thông tin loại người dùng</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.kindofuser.update',['id' => $loainguoidung->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Loại người dùng <span class="text-danger">(*)</label>
                <input type="text" name="ten" class="form-control" placeholder="Loại người dùng" value="{{$loainguoidung->ten}}">
            
            </div>

            <div class="form-group">
                <label>Mô tả <span class="text-danger">(*)</label>
                <textarea class="form-control" name="mota" rows="3"  placeholder="Mô tả">{{$loainguoidung->mota}}</textarea>
                <script>
                    CKEDITOR.replace( 'mota' );
                </script>
            </div>
            
            <hr>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>

@endsection