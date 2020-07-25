<!-- đây là bảng Khách hàng -->

@extends('api-admin.master')
@section('title','Danh sách sản phẩm khuyến mãi')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3><a href="{{route('admin.saleproduct.create')}}">Thêm mới</a></h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.saleproduct.index')}}" method="POST">
            <table style="text-align: center" id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khuyến mãi</th>
                        <th>Sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($khuyenmaisanpham as $kmsp)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $kmsp->KhuyenMai->tieude }}</td>
                        <td>{{ $kmsp->SanPham->ten }}</td>
                        <td>{!! $kmsp->mota !!}</td>
                        <td>
                            <a href="{{route('admin.saleproduct.edit',['id' => $kmsp->id])}}" class="btn btn-danger">Sửa</a>
                            <a href="{{route('admin.saleproduct.destroy',['id' => $kmsp->id])}}" onclick="return checkDelete('Bạn có muốn xóa sản phẩm này không?')" class="btn btn-success">Xoá</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
</div>

@endsection
