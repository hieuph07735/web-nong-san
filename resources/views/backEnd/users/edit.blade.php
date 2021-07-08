@extends('backEnd.layouts.main')
@section('title')
Sửa tài khoản
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
              <a href="{{route('user.list',['status'=>0])}}" style="text-decoration: none">Danh sách tài khoản</a>
            </li>
          </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header">
                Sửa tài khoản
            </div>
            
            <div class="card-body">
                <form action="{{route('user.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active">Họ tên</label>
                      <input type="text" class="form-control" name="name" value="{{$data->name}}">
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active">Số điện thoại</label>
                      <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                      @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active">Email</label>
                      <input type="text" class="form-control" name="email" value="{{$data->email}}">
                      @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active">Mật khẩu</label>
                      <input type="password" class="form-control" name="password" value="{{$data->password}}">
                      @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active">Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" name="password_confirmation" value="{{$data->password}}">
                      @error('password_confirmation')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active" >Ảnh đại diện</label>
                      <input type="file" class="form-control" name="avatar">
                      <img src="{{ $data->avatar }}" style="width: 100px">
                      @error('avatar')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1" class="breadcrumb-item active">Quyền</label>
                      <select class="form-control" name="role"> 
                        <option value="1" {{$data->role == 1 ?"selected":''}}>Khách hàng</option>
                        <option value="2" {{$data->role == 2 ?"selected":''}}>Quản trị</option>
                      </select>
                      @error('role')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1" class="breadcrumb-item active">Trạng thái</label>
                      <select class="form-control" name="status"> 
                        <option value="1" {{$data->status == 1 ?"selected":''}}>Hoạt động</option>
                        <option value="2" {{$data->status == 2 ?"selected":''}}>Tạm dừng</option>
                      </select>
                      @error('type')
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

