@extends('backEnd.layouts.main')
@section('title')
    Tạo mới tài khoản
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
                        <a href="{{route('user.index',['status'=>0])}}" style="text-decoration: none">Danh sách tài
                            khoản</a>
                    </li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    Tạo mới tài khoản
                </div>

                <div class="card-body">
                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Họ tên</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone')}}">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email')}}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password')}}">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                   value="{{ old('password_confirmation')}}">
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Quyền</label>
                            <select class="form-control" name="role">
                                <option value="0" {{old('role') == 0 ?"selected":''}}>Khách hàng</option>
                                <option value="1" {{old('role') == 1 ?"selected":''}}>Quản trị</option>
                            </select>
                            @error('role')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="0" {{old('status') == 0 ?"selected":''}}>Hoạt động</option>
                                <option value="1" {{old('status') == 1 ?"selected":''}}>Tạm dừng</option>
                            </select>
                            @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Tạo</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

