@extends('api-admin.master')
@section('title','Danh sách nhà vận chuyển')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <a href="{{route('admin.transport.create')}}" class="btn btn-success">Thêm nhà vận chuyển</a>
        </h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead style="text-align: center">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead> 
            <tbody style="text-align: center">
                @foreach ($NhaVanChuyen as $NVC)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{ $NVC->ten }}</td>
                    <td>{{ $NVC->diachi }}</td>
                    <td>{{ $NVC->sdt }} </td>
                    <td>{!! $NVC->mota !!} </td>
                    <td>
                        <a href="{{route('admin.transport.edit',['id' => $NVC->id])}}" class="btn btn-success">Sửa <i class="fa fa-pencil"></a>
                        <a href="{{route('admin.transport.destroy',['id' => $NVC->id])}}" onclick="return checkDelete('Bạn có muốn xóa nhà vận chuyển này không?')" class="btn btn-danger">Xóa <i class="fa fa-close"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
        
    </div> --}}
    <!-- /.card-footer-->
</div>

@endsection