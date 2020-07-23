@extends('api-admin.master')
@section('title','Thêm loại sản phẩm')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm loại sản phẩm</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.category.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên loại sản phẩm <span class="text-danger">(*)</label>
                    <input type="text" name="ten" class="form-control"   placeholder="Tên loại sản phẩm">
                    @if ($errors->has('ten'))
                        <div class="text-danger">
                            {{$errors->first('ten')}}
                        </div>
                    @endif
                </div>
    
                <div class="form-group">
                    <label>Mô tả <span class="text-danger">(*)</label>
                    <textarea class="form-control" name="mota" rows="3" placeholder="Mô tả"></textarea>
                    
                    <script>
                        CKEDITOR.replace( 'mota' );
                    </script>

                    @if ($errors->has('mota'))
                        <div class="text-danger">
                            {{$errors->first('mota')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Ảnh <span class="text-danger">(*)</label>
                    <input type="file" class="form-control-file"   name="anh">
                    @if ($errors->has('anh'))
                        <div class="text-danger">
                            {{$errors->first('anh')}}
                        </div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label>Nhóm sản phẩm <span class="text-danger">(*)</label>
                    <select name="nhom_id" class="form-control">
                        <option value="">----Chọn nhóm sản phẩm----</option>
                    @foreach ($NhomSanPham as $NhomSP)
                        <option value="{{$NhomSP->id}}">{{$NhomSP->ten}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('nhom_id'))
                        <div class="text-danger">
                            {{$errors->first('nhom_id')}}
                        </div>
                    @endif
                </div>
    
                <hr>
                <a href="{{route('admin.category.index')}}" class="btn btn-warning">Quay Lại</a>
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>

@endsection