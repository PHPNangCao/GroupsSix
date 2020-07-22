@extends('api-admin.master')
@section('title','Danh sách sản phẩm')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <a href="{{route('admin.product.create')}}">Thêm Sản phẩm </a>
        </h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead style="text-align: center">
                <tr>
                    <th>Mã</th>
                    <th>Tên Sản phẩm </th>
                    <th>Mô Tả</th>
                    <th>Hình ảnh</th>
                    <th>Loại Sản phẩm</th>
                    <th>Đơn vị tính</th> 
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach ($SanPham as $SP)
                <tr> 
                    <td>{{$loop->iteration }}</td>
                    <td>{{ $SP->ten }}</td>
                    <td>{{ $SP->mota }}</td>
                    <td><img src="public/upload/product/{{$SP->anh}}" alt="" height="100px"></td>
                    <td>{{ $SP->LoaiSanPham->ten }}</td>
                    <td>{{ $SP->DonViTinh->ten }}</td>
                    <td>
                        @if ($SP->trangthai == 1)
                            <a href="{{route('admin.product.status',['id' => $SP->id])}}" class="btn btn-success">Show</i></a>
                        @else
                            <a href="{{route('admin.product.status',['id' => $SP->id])}}" class="btn btn-danger">Hide</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.product.edit',['id' => $SP->id])}}" class="btn btn-danger">Sửa</a>
                        <a href="{{route('admin.product.destroy',['id' => $SP->id])}}" onclick="return checkDelete('Bạn có muốn xóa sản phẩm này không?')" class="btn btn-success">Xoá</a>
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