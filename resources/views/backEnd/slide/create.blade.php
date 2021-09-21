@extends('backend.layouts.app')

@section('title')
    Slide
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title">Tạo mới slide</h4>
              </div>
              <div class="card-body ">                
                    <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên slide</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                       
                      
                        <div class="form-group">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset('backend/assets/img/image_placeholder.jpg') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Chọn Ảnh Sản Phẩm</span>
                                        <span class="fileinput-exists">Thay Đổi</span>
                                        <input type="file" name="image">
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
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hoạt động</option>
                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Tạm dừng</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">tạo mới</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection
