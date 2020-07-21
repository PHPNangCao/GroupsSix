@extends('api-admin.master')
@section('title','Tạo Đơn Vị Tính')
@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route ('admin.unit.store')}}" method = "POST" >
        @csrf
        <div class="col-md-4">
          <div class="form-group">
            <label>Tên đơn vị tính</label>
            <input type="text" class="form-control" name="ten" placeholder="Tên đơn vị tính">
            @if ($errors->has('ten'))
            <div class="text-danger">
                {{$errors->first('ten')}}
            </div>
            @endif
          </div>
    
          <div class="form-product">
              <label>Mô tả</label>
              <textarea class="form-control" name="mota" rows="3" placeholder="Mô tả"></textarea>
              @if ($errors->has('mota'))
              <div class="text-danger">
                  {{$errors->first('mota')}}
              </div>
              @endif
          </div>
          <hr>
          <a href="{{route('admin.unit.index')}}" class="btn btn-warning">Quay Lại</a>
          <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </div> 
      </form>
  </div> 
</div> 
@endsection