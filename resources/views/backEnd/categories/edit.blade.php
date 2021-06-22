@extends('backEnd.layouts.main')
@section('title')
Sửa danh mục
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
              <a href="{{route('category.list')}}" style="text-decoration: none">Danh sách danh mục</a>
            </li>
          </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header">
                Sửa danh mục
            </div>
            
            <div class="card-body">
                <form action="{{route('category.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active">Tên danh mục</label>
                      <input type="text" class="form-control" name="name" value="{{$data->name}}">
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active" >Ảnh</label>
                      <input type="file" class="form-control" name="image">
                      @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="breadcrumb-item active">Loại danh mục</label>
                        <select class="form-control" name="type"> 
                          <option value="1" {{$data->type == 1 ?"selected":''}}>Sản phẩm</option>
                          <option value="2" {{$data->type == 2 ?"selected":''}}>Bài viết</option>
                        </select>
                        @error('type')
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

