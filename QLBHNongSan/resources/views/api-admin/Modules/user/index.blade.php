@extends('api-admin.master')
@section('title','Danh sách người dùng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><a href="{{route('admin.user.create')}}">Thêm mới</a></h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ten </th>
                    <th>Email </th>
                    <th>Password</th>
                    <th>Loại người dùng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($LoaiNguoiDung as $nd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nd->name }}</td>
                    <td>{{ $nd->email }}</td>
                    <td>{{ $nd->password }}</td>
                    <td>{{ $nd->loainguoidung->ten }}</td>
                    <td>
                        <a href="{{route('admin.user.edit',['id' => $nd->id])}}" class="btn btn-success">Sửa</a>
                        <a href="{{route('admin.user.destroy',['id' => $nd->id])}}" onclick="return checkDelete('Bạn có muốn xóa người dùng này không?')" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->

</div>
@endsection
