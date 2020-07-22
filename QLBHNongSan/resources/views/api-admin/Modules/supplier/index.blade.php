@extends('api-admin.master')
@section('title','Danh sách nhà cung cấp')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách nhà cung cấp <a href="{{route('admin.supplier.create')}}" class="btn btn-success">Thêm mới</a></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Thao tác</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($NhaCungCap as $NhaCC)
                <tr style="text-align: center">
                    <td>{{$loop->iteration }}</td>
                    <td>{{ $NhaCC->ten }}</td>
                    <td>{{ $NhaCC->diachi }}</td>
                    <td>{{ $NhaCC->sdt }}</td>
                    <td>
                        <a href="{{route('admin.supplier.edit',['id' => $NhaCC->id])}}" class="btn btn-success">Sửa</a>
                        <a href="{{route('admin.supplier.destroy',['id' => $NhaCC->id])}}"  class="btn btn-danger" onclick="return checkDelete('Bạn có muốn xóa nhóm này không?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot> --}}
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>

@endsection