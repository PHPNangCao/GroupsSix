@extends('api-admin.master')
@section('title','Sửa thông tin khuyến mãi')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa thông tin khuyến mãi</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.sale.update', ['id' => $khuyenmai->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu Đề</label>
                <input type="text" class="form-control-file" name="tieude" value="{{$khuyenmai->tieude}}">
            </div>
            <div class="form-group">
                <label>Nội Dung</label>
                <textarea class="form-control" name="noidung" rows="3" placeholder="noidung">{{$khuyenmai->noidung}}</textarea>
                <script>
                    CKEDITOR.replace( 'noidung' );
                </script>
            
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="hidden" name="image" value="{{$khuyenmai->anh}}">
                <input type="hidden" name="tinhtrang" value="{{$khuyenmai->tinhtrang}}">
                <input type="file" class="form-control-file" name="anh" value="{{$khuyenmai->anh}}">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Ảnh đã lưu</label><br>
                    <a href="#" class="thumbnail">
                        <img src="public/upload/sale/{{$khuyenmai->anh}}" alt="" height="100px">
                    </a>
                </div>
            </div>
          
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection
