@extends('backEnd.layouts.main')
@section('title')
    Sửa nhà cung cấp
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
                        <a href="{{route('category.index')}}" style="text-decoration: none">Danh sách nhà cung cấp</a>
                    </li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    Sửa nhà cung cấp
                </div>

                <div class="card-body">
                    <form action="{{route('unit.update',['id'=>$data->id])}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="{{$data->address}}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1" {{$data->status == 1 ?"selected":''}}>Hoạt động</option>
                                <option value="2" {{$data->status == 2 ?"selected":''}}>Tạm dừng</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

