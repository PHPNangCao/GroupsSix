@extends('api-admin.master')
@section('title','Thêm thông tin khuyến mãi')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm thông tin khuyến mãi</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.sale.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label>Tiêu Đề</label>
                <input type="text" class="form-control-file"  name="tieude">
                @if ($errors->has('tieude'))
                <div class="text-danger">
                    {{$errors->first('tieude')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Nội Dung</label>
                <textarea class="form-control" name="noidung" rows="3"  placeholder="noidung"></textarea>
                <script>
                    CKEDITOR.replace( 'noidung' );
                </script>
                @if ($errors->has('noidung'))
                    <div class="text-danger">
                        {{$errors->first('noidung')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file" class="form-control-file"  name="anh">
                @if ($errors->has('anh'))
                    <div class="text-danger">
                        {{$errors->first('anh')}}
                    </div>
                @endif
            </div>
            <a href="{{route('admin.sale.index')}}" class="btn btn-warning">Quay Lại</a>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>

@endsection