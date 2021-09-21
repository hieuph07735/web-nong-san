@extends('backend.layouts.app')

@section('title')
   Chỉnh sửa danh mục
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Chỉnh Sửa Danh Mục</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',['id'=>$data->id])}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên danh mục</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Mô tả</label>
                            <textarea  type="text" class="form-control" name="description" value="{{$data->description}}">{{$data->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">

                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset($data->image) }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Chọn Ảnh Sản Phẩm</span>
                                        <span class="fileinput-exists">Thay Đổi</span>
                                        <input type="file" name="image[]" value="{{$data->image}}">
                                    </span>
                                    <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists"
                                        data-dismiss="fileinput"><i class="fa fa-times"></i>
                                        Xóa bỏ
                                    </a>
                                </div>
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                       <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>Tạm dừng</option>
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
