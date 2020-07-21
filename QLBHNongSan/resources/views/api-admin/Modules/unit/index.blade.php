@extends('api-admin.master')
@section('title','Đơn Vị Tính')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <a href="{{route('admin.unit.create')}}">Thêm Đơn Vị Tính</a>
        </h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead style="text-align: center">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th> 
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach ($DonViTinh as $DVT)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{ $DVT->ten }}</td>
                    <td>{{ $DVT->mota }}</td>
                    <td>
                        <a href="{{route('admin.unit.edit',['id' => $DVT->id])}}" class="btn btn-success">Sửa</a>
                        <a href="{{route('admin.unit.destroy',['id' => $DVT->id])}}" onclick="return checkDelete('Bạn có muốn xóa đơn vị tính này không?')" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        
    </div>
    <!-- /.card-footer-->
</div>
@endsection