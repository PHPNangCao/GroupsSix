<!-- đây là bảng Khách hàng -->

@extends('api-admin.master')
@section('title','Danh sách khuyến mãi')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thông tin khuyến mãi<a href="{{route('admin.sale.create')}}">Thêm mới</a></h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.sale.index')}}" method="POST">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="text-align: center">
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Url</th>
                        <th>Nội dung</th>
                        <th>Ảnh</th>
                        <th>Trình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($khuyenmai as $km)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{ $km->tieude }}</td>
                        <td>{{ $km->url }}</td>
                        <td>{{ $km->noidung }}</td>
                        <td><img src="public/upload/sale/{{$km->anh}}" alt="" height="100px"></td>
                        <td>
                            @if ($km->tinhtrang == 1)
                                <a href="{{route('admin.sale.status',['id' => $km->id])}}" class="btn btn-success">Show</i></a>
                            @else
                                <a href="{{route('admin.sale.status',['id' => $km->id])}}" class="btn btn-danger">Hide</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.sale.edit',['id' => $km->id])}}" class="btn btn-success">Sửa <i class="fa fa-pencil"></a>
                            <a href="{{route('admin.sale.destroy',['id' => $km->id])}}" onclick="return checkDelete('Bạn có muốn xóa loại sản phẩm này không?')" class="btn btn-danger">Xóa <i class="fa fa-close"></a>
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
