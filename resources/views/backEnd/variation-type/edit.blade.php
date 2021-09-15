@extends('backEnd.layouts.main')
@section('title')
   Cập nhập kiểu thuộc tính
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('variation-type.index')}}" style="text-decoration: none">Danh sách kiểu thuộc tính</a>
                    </li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    Cập nhập kiểu thuộc tính
                </div>
                <div class="card-body">
                    <form action="{{route('variation-type.update', $data->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                        </div>
                        <button type="submit" class="btn btn-success">cập nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

