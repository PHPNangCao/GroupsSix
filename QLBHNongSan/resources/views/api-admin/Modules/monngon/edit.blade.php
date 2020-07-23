@extends('api-admin.master')
@section('title','Sửa món ngon')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa món ngon</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.monngon.update',['id' => $monngon->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-product">
                <label >Tiêu đề</label>
                <input type="text" name="tieude" class="form-control" value="{{$monngon->tieude}}">
            </div>
            <div class="form-product">
                <label >Tóm tắt</label>
                <input type="text" name="tomtat" class="form-control" value="{{$monngon->tomtat}}">
            </div>
            <div class="form-product">
                <label >Nội dung</label>
                <textarea type="text" name="noidung" class="form-control" >{{$monngon->noidung}}</textarea>
                <script>
                    CKEDITOR.replace( 'noidung' );
                </script>
            </div>
            <div class="form-group">
                <label>Ảnh <span class="text-danger">(*)</label>
                <input type="hidden" name="image" value="{{$monngon->anh}}">
                <input type="file" class="form-control-file" name="anh">
            </div>   
            <div class="col-md-4">
                <div class="form-group">
                    <label>Ảnh đã lưu</label>
                    <a href="#" class="thumbnail">
                        <img src="public/upload/monngon/{{$monngon->anh}}" alt="" height="100px">
                    </a>
                </div>
            </div>
            <input type="hidden" name="trangthai" value="{{$monngon->trangthai}}">
            <div class="form-product">
                <label >Sản phẩm </label>
                <select name="sanpham_id" class="form-control">
                    <option value="">San Pham</option>
                    @foreach($SanPham as $SP)
                <option value="{{$SP->id}}" selected = "{{$monngon->sanpham_id}}">{{$SP->ten}}</option>
                    @endforeach
                </select>
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