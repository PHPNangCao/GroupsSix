@extends('api-admin.master')
@section('title','Sửa quảng cáo')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa quảng cáo</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.promotional.update',['id' => $quangcao->id])}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <div class="col-md-6">
                    <label>Ảnh <span class="text-danger">(*)</label>
                        <input type="hidden" name="image" value="{{$quangcao->anh}}">
                        <input type="hidden" name="trangthai" value="{{$quangcao->trangthai}}">
                        <input type="file" class="form-control-file"  name="anh">
                        @if ($errors->has('anh'))
                        <div class="text-danger">
                            {{$errors->first('anh')}}
                        </div>
                        @endif
                </div>
                <div class="col-md-4">
                    <hr>
                    <label>Ảnh đã lưu</label>
                    <br>
                    <img src="public/upload/quangcao/{{$quangcao->anh}}" alt="" height="100px">
                </div>
        </div>   
            <div class="form-group">
                <label>Url <span class="text-warning">(Nếu có)</label>
                <input type="text" class="form-control-file"  name="url" placeholder="dinh-dang-nhu-vay" value="{{$quangcao->url}}">
            </div>
            <div class="form-group">
                <label>Khuyến mãi</label>
                <select name="khuyenmai_id" class="form-control">
                <option >----Chọn Khuyến mãi----</option>
                @foreach ($khuyenmai as $km)
                  <option value="{{$km->id}}" selected = "{{$quangcao->khuyenmai_id}}"> {{$km->tieude}}</option>                    
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