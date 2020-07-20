@extends('api-admin.master')
@section('title','Thêm nhóm sản phẩm')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm nhóm sản phẩm</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.group.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label>Tên nhóm sản phẩm <span class="text-danger">(*)</label>
                    <input type="text" name="ten" class="form-control"  placeholder="Tên nhóm sản phẩm">
                    @if ($errors->has('ten'))
                        <div class="text-danger">
                            {{$errors->first('ten')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Mô tả <span class="text-danger">(*)</label>
                    <textarea class="form-control" name="mota" rows="3"  placeholder="Mô tả"></textarea>
                    @if ($errors->has('mota'))
                        <div class="text-danger">
                            {{$errors->first('mota')}}
                        </div>
                    @endif
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
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
        Footer
    </div> --}}
    <!-- /.card-footer-->
</div>

@endsection