@extends('api-admin.master')
@section('title','Thêm tin tuyển dụng')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tạo tin tuyển dụng</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.recruitment.store')}}" method="POST">
            @csrf
            <div class="form-product">
                <label >Tiêu đề <span class="text-danger">*</span></label>
                <input type="text" name="tieude" class="form-control" placeholder="Nhập tiêu đề" value="{{ old('tieude') }}">
                <span class="text-danger"> @error('tieude') {{ $message }} @enderror</span>
            </div>
            <div class="form-product">
                <label >URL <span class="text-danger">*</span></label>
                <input type="text" name="url" class="form-control" value="{{ old('url') }}">
                <span class="text-danger"> @error('url') {{ $message }} @enderror</span>
            </div>
            <div class="form-product">
                <label >Ảnh <span class="text-danger">*</span></label>
                <input type="file" name="anh" class="form-control">
                <label >Ảnh đã lưu</label>
            </div>
            <div class="form-product">
                <label >Mô tả <span class="text-danger">*</span></label>
                <textarea type="text" name="mota" class="form-control" placeholder="Nhập mô tả" >{{ old('mota') }}</textarea>
                <script>
                    CKEDITOR.replace( 'mota' );
                </script>
                <span class="text-danger"> @error('mota') {{ $message }} @enderror</span>
            </div>
            <div class="form-product">
                <label >Liên hệ <span class="text-danger">*</span></label>
                <input type="text" name="lienhe" class="form-control" value="{{ old('lienhe') }}">
                <span class="text-danger"> @error('mota') {{ $message }} @enderror</span>
            </div>
            <br>
            <div class="form-product">
                <label >Tình trạng <span class="text-danger">*</span></label>
                <br>
                    <input type="radio" name="tinhtrang" value="1"  value="{{ old('tinhtrang') }}">Mở
                    <input type="radio" name="tinhtrang" value="0"  value="{{ old('tinhtrang') }}">Ẩn
                <br>
                    <span class="text-danger"> @error('tinhtrang') {{ $message }} @enderror</span>
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
