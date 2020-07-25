<!-- đây là bảng Khách hàng -->

@extends('api-admin.master')
@section('title','Danh sách quảng cáo')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3><a href="{{route('admin.promotional.create')}}" class="btn btn-dark">Thêm mới</a></h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.promotional.index')}}" method="POST">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Url</th>
                        <th>Khuyến mãi </th>
                        <th>Trạng Thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quangcao as $qc)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td><img src="public/upload/quangcao/{{$qc->anh}}" alt="" height="100px"></td>
                        <td>{{ $qc->url }}</td>
                        <td>{{ $qc->KhuyenMai->tieude }}</td>
                        <td>
                            @if ($qc->trangthai == 1)
                                <a href="{{route('admin.promotional.status',['id' => $qc->id])}}" class="btn btn-success">Show</i></a>
                            @else
                                <a href="{{route('admin.promotional.status',['id' => $qc->id])}}" class="btn btn-danger">Hide</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.promotional.edit',['id' => $qc->id])}}" class="btn btn-success">Sửa</a>
                            <a href="{{route('admin.promotional.destroy',['id' => $qc->id])}}" onclick="return checkDelete('Bạn có muốn xóa quảng cáo này không?')" class="btn btn-danger" >Xoá</a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
        Footer
    </div> --}}
    <!-- /.card-footer-->
</div>

@endsection