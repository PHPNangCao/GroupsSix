@extends('api-admin.master')
@section('title','Danh sách tin tuyển dụng')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><a href="{{route('admin.recruitment.create')}}">Thêm mới tin tuyển dụng</a></h3>
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
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề </th>
                    <th>URL</th>
                    <th>Ảnh</th>
                    <th>Mô tả</th>
                    <th>Liên hệ</th>
                    <th>Ngày tạo</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TuyenDung as $td)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $td->tieude }}</td>
                    <td>{{ $td->url }}</td>
                    <td><img src="public/upload/tuyendung/{{$td->anh}}" alt="" height="100px"></td>
                    <td>{!! $td->mota !!}</td>
                    <td>{{ $td->lienhe }}</td>
                    <td>{{ $td->created_at }}</td>
                    <td>
                        @if($td->tinhtrang == 1)
                            Đang còn tuyển
                        @else
                            Đang ngưng tuyển
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.recruitment.edit',['id' => $td->id])}}">Sửa</a>
                        <a href="{{route('admin.recruitment.destroy',['id' => $td->id])}}" onclick="return checkDelete('Bạn có muốn xóa bài tin này không?')">Xóa</a>
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
        Footer
    </div> --}}
    <!-- /.card-footer-->

</div>
@endsection