@extends('api-admin.master')
@section('title','Thêm món ngon')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tạo món ngon</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.monngon.store')}}" method="POST">
            @csrf
            <div class="form-product">
                <label >Tiêu đề <span class="text-danger">*</span></label>
                <input type="text" name="tieude" class="form-control" placeholder="Nhập tiêu đề">
                <span class="text-danger"> @error('tieude') {{ $message }} @enderror</span>
            </div>
            <div class="form-product">
                <label >Tóm tắt <span class="text-danger">*</span></label>
                <input type="text" name="tomtat" class="form-control" placeholder="Nhập tóm tắt">
                <span class="text-danger"> @error('tomtat') {{ $message }} @enderror</span>
            </div>
            <div class="form-product">
                <label >Nội dung <span class="text-danger">*</span></label>
                <textarea type="text" name="noidung" class="form-control" placeholder="Nhập nội dung"></textarea>
                <script>
                    CKEDITOR.replace( 'noidung' );
                </script>
            </div>
            <div class="form-product">
                <label >Ảnh <span class="text-danger">*</span></label>
                <input type="file" name="anh" class="form-control-file" >
                <span class="text-danger"> @error('anh') {{ $message }} @enderror</span>
            </div>
            <br>
            <div class="form-product">
                <label >Trạng thái <span class="text-danger">*</span></label>
                    <input type="radio" name="trangthai" value="1" >Mở
                    <input type="radio" name="trangthai" value="0" >Ẩn
                <br>
                    <span class="text-danger"> @error('trangthai') {{ $message }} @enderror</span>
            </div>
            <div class="form-product">
                <label >Sản phẩm <span class="text-danger">*</span></label>
                <select name="sanpham_id" class="form-control">
                    <option>----Chọn sản phẩm----</option>
                    @foreach($sanpham as $sp)
                        <option value="{{$sp->id}}">{{$sp->ten}}</option>
                    @endforeach
                </select>
                <span class="text-danger"> @error('sanpham_id') {{ $message }} @enderror</span>
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
