@extends('backend.layouts.app')

@section('title')
   Chỉnh sửa nhà cung cấp
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Chỉnh Sửa Sản Phẩm</h4>
                </div>  <div class="card-body">
                    <form action="{{route('units.update',['id'=>$data->id])}}" method="POST"
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
@endsection
