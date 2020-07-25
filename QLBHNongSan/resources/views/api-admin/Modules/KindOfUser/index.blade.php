@extends('api-admin.master')
@section('title','Danh sách Loại Người Dùng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3><a href="{{route('admin.kindofuser.create')}}">Thêm mới</a></h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.kindofuser.index')}}" method="POST">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Loại Người Dùng</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loainguoidung as $loaind)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{ $loaind->ten }}</td>
                        <td>{!! $loaind->mota !!}</td>
                        <td>
                            <a href="{{route('admin.kindofuser.edit',['id' => $loaind->id])}}" class="btn btn-success">Sửa</a>                      
                            <a href="{{route('admin.kindofuser.destroy',['id' => $loaind->id])}}" onclick="return checkDelete('Bạn có muốn xóa thông tin khách hàng này không?')" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </form>
    </div>
</div>

@endsection