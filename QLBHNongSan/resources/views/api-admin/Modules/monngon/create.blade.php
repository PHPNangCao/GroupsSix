@extends('api-admin.master')
@section('title','Thêm món ngon')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tạo món ngon</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.monngon.store')}}" enctype="multipart/form-data" method="POST">
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
            <div class="form-group">
                <label>Ảnh <span class="text-danger">(*)</label>
                <input type="file" class="form-control-file"  name="anh">
                @if ($errors->has('anh'))
                <div class="text-danger">
                    {{$errors->first('anh')}}
                </div>
                @endif
            </div> 
            <input type="hidden" value="1" name="trangthai">
            <div class="form-product">
                <label >Sản phẩm <span class="text-danger">*</span></label>
                <select name="sanpham_id" class="form-control">
                    <option>----Chọn sản phẩm----</option>
                    @foreach($sanpham as $SP)
                        <option value="{{$SP->id}}">{{$SP->ten}}</option>
                    @endforeach
                </select>
                <span class="text-danger"> @error('sanpham_id') {{ $message }} @enderror</span>
            </div>
            <br>
            <a href="{{route('admin.monngon.index')}}" class="btn btn-warning">Quay Lại</a>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->

</div>
@endsection
