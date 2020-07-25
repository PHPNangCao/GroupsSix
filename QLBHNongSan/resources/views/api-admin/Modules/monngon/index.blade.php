@extends('api-admin.master')
@section('title','Danh sách món ngon')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách món ngon <a href="{{route('admin.monngon.create')}}">Thêm mới</a></h3>
    </div>
    <div class="card-body">
        <table style="text-align: center" id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề </th>
                    <th>Tóm tắt</th>
                    <th>Nội dung</th>
                    <th>Lượt xem</th>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monngon as $mn)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mn->tieude }}</td>
                    <td>{{ $mn->tomtat }}</td>
                    <td>{!! $mn->noidung !!}</td>
                    <td>{{ $mn->luotxem }}</td>
                    <td><img src="public/upload/monngon/{{$mn->anh}}" alt="" height="100px"></td>
                    <td>{{ $mn->SanPham->ten }}</td>
                    <td>
                        @if ($mn->trangthai == 1)
                            <a href="{{route('admin.monngon.status',['id' => $mn->id])}}" class="btn btn-success">Show</i></a>
                        @else
                            <a href="{{route('admin.monngon.status',['id' => $mn->id])}}" class="btn btn-danger">Hide</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.monngon.edit',['id' => $mn->id])}}" class="btn btn-success">Sửa</a>
                        <a href="{{route('admin.monngon.destroy',['id' => $mn->id])}}" onclick="return checkDelete('Bạn có muốn xóa sản phẩm này không?')" class="btn btn-danger" >Xoá</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->

</div>
@endsection