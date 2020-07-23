@extends('api-admin.master')
@section('title','Sửa thông tin quảng cáo')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa thông tin quảng cáo</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.promotional.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file" class="form-control-file" name="anh" value="{{$quangcao->anh}}">
                @if ($errors->has('anh'))
                <div class="text-danger">
                    {{$errors->first('anh')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Khuyến mãi <span class="text-danger">(*)</label>
                <select name="khuyenmai_id" class="form-control">
                <option >----Chọn Khuyến mãi----</option>
                @foreach ($khuyenmai as $km)
                    <option value="{{$khuyenmai->id}}" selected = {{$quangcao->khuyenmai_id}}>{{$khuyenmai->ten}}</option>
                @endforeach
                </select>
                @if ($errors->has('khuyenmai_id'))
                <div class="text-danger">
                    {{$errors->first('khuyenmai_id')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection