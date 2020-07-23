@extends('api-admin.master')
@section('title','Thêm quảng cáo')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm quảng cáo</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.promotional.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label>Ảnh <span class="text-danger">(*)</label>
                <input type="file" class="form-control-file"  name="anh">
                @if ($errors->has('anh'))
                <div class="text-danger">
                    {{$errors->first('anh')}}
                </div>
                @endif
            </div>   
            <div class="form-group">
                <label>Khuyến mãi</label>
                <select name="khuyenmai_id" class="form-control">
                <option >----Chọn Khuyến mãi----</option>
                @foreach ($khuyenmai as $km)
                  <option value="{{$km->id}}"> {{$km->noidung}}</option>                    
                @endforeach
                </select>
                @if ($errors->has('khuyenmai_id'))
                <div class="text-danger">
                    {{$errors->first('khuyenmai_id')}}
                </div>
                @endif
            </div>
            <a href="{{route('admin.promotional.index')}}" class="btn btn-warning">Quay Lại</a>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection