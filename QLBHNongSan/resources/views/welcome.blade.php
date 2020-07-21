@extends('api-admin.master')
@section('title','Danh sách danh mục')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Danh sách danh mục <a href="{{route('admin.category.create')}}">Thêm mới</a></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
   
</div>

@endsection