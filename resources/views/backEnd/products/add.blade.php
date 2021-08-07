@extends('backEnd.layouts.main')
@section('title')
    Tạo mới loại sản phẩm
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
                        <a href="{{route('product.index')}}" style="text-decoration: none">Danh sách loại sản phẩm</a>
                    </li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    Tạo mới loại sản phẩm
                </div>

                <div class="card-body">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Mô tả</label>
                            <textarea  type="text" class="form-control" name="description" value="{{ old('description')}}"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Danh mục</label>
                            <select class="form-control mul-select" name="category_id" multiple>
                                @foreach ($type_product as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('category_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Ảnh</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="1" {{old('status') == 1 ?"selected":''}}>Hoạt động</option>
                                <option value="2" {{old('status') == 2 ?"selected":''}}>Tạm dừng</option>
                            </select>
                            @error('status')
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



{{--@extends('backEnd.layouts.main')--}}
{{--@section('title')--}}
{{--    Tạo mới sản phẩm--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <main>--}}
{{--        <div class="container-fluid px-4">--}}
{{--            <ol class="breadcrumb mb-4">--}}
{{--                <li class="breadcrumb-item active"></li>--}}
{{--            </ol>--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item">--}}
{{--                        <a href="{{ route('product.index') }}" style="text-decoration: none">Danh sách sản phẩm</a>--}}
{{--                    </li>--}}
{{--                </ol>--}}
{{--            </nav>--}}

{{--            <div class="card mb-4">--}}
{{--                <div class="card-header">--}}
{{--                    Tạo mới sản phẩm--}}
{{--                </div>--}}

{{--                <div class="card-body">--}}
{{--                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên sản phẩm</label>--}}
{{--                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">--}}
{{--                            @error('name')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputEmail1" class="breadcrumb-item active">Mô tả </label>--}}
{{--                            <textarea class="form-control" name="description" id="descCk" cols="30"--}}
{{--                                      rows="5">{{ old('description') }}</textarea>--}}
{{--                            @error('description')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputEmail1" class="breadcrumb-item active">Nhà sản xuất</label>--}}
{{--                            <input type="text" class="form-control" name="unit" value="{{ old('unit') }}">--}}
{{--                            @error('unit')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Loại sản phẩm</label>--}}
{{--                            <select class="form-control mul-select" name="category" multiple>--}}
{{--                                @foreach ($type_product as $value)--}}
{{--                                    <option value="{{ $value->id }}"--}}
{{--                                        {{ old('category') == $value->id ? 'selected' : '' }}>{{ $value->name }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('category')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputEmail1" class="breadcrumb-item active">Ảnh</label>--}}
{{--                            <input type="file" class="form-control" name="image" multiple>--}}
{{--                            @error('image')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Trạng thái</label>--}}
{{--                            <select class="form-control" name="status">--}}
{{--                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hoạt động</option>--}}
{{--                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Tạm dừng</option>--}}
{{--                            </select>--}}
{{--                            @error('status')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <div class="form-group list_price ">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <label>Giá tiền</label>--}}
{{--                                    <input type="number" name="price" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <label>Giá giảm</label>--}}
{{--                                    <input type="number" name="discount_price" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <label>Số lượng</label>--}}
{{--                                    <input type="number" min="1" name="amount" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <label>Ngày nhập</label>--}}
{{--                                    <input type="date" name="quality" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <label>Ngày hết hạn</label>--}}
{{--                                    <input type="date" name="end_time" class="form-control">--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <button type="submit" class="btn btn-success">Tạo</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}
{{--@endsection--}}
