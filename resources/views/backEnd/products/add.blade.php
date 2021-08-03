@extends('backEnd.layouts.main')
@section('title')
    Tạo mới sản phẩm
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
                        <a href="{{ route('product.index') }}" style="text-decoration: none">Danh sách sản phẩm</a>
                    </li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    Tạo mới sản phẩm
                </div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Mô tả </label>
                            <textarea class="form-control" name="desc" id="descCk" cols="30"
                                      rows="5">{{ old('desc') }}</textarea>
                            @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Chi tiết</label>
                            <textarea class="form-control" name="detail" id="detailCk" cols="30"
                                      rows="5">{{ old('detail') }}</textarea>
                            @error('detail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Danh mục</label>
                            <select class="form-control mul-select" name="category" multiple>
                                @foreach ($category as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('category') == $value->id ? 'selected' : '' }}>{{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Ảnh</label>
                            <input type="file" class="form-control" name="image" multiple>
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
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Đơn vị đo</label>
                            <input type="text" class="form-control" name="unit" multiple>
                            @error('unit')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group list_price ">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Tên phân loại</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Giá tiền</label>
                                    <input type="number" name="price" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Giá giảm</label>
                                    <input type="number" name="discount_price" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Số lượng</label>
                                    <input type="number" min="1" name="quanlity" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Ngày hết hạn</label>
                                    <input type="date" name="end_time" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label></label>
                                    <a class="form-control btn btn-success add_input">Thêm phân loại</a>
                                </div>
                                <br>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-success submitForm">Tạo</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('select').select2();
        CKEDITOR.replace('descCk');
        CKEDITOR.replace('detailCk');
        var stt = []
        $(".add_input").click(function () {
            $('.list_price').append(function () {
                if (stt.length == 0) {
                    var number = 0
                    stt[0] = number
                    return '<div class="row btnrow' + number +
                        '"><div class="col-md-2"><label>Tên phân loại</label><input type="text" name="title' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Giá tiền</label><input type="number" name="price' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Giá giảm</label><input type="number" name="discount_price' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Số lượng</label><input type="number" min="1" name="quanlity' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Ngày hết hạn</label><input type="date" name="end_time' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label></label><a class="form-control  text-danger" onclick="delete_input(' +
                        number + ')" style="border:white"><i class="bi bi-trash"></i></a></div><br></div>'
                } else {
                    var number = (stt.length)
                    stt[number] = number
                    return '<div class="row btnrow' + number +
                        '"><div class="col-md-2"><label>Tên phân loại</label><input type="text" name="title' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Giá tiền</label><input type="number" name="price' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Giá giảm</label><input type="number" name="discount_price' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Số lượng</label><input type="number" min="1" name="quanlity' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label>Ngày hết hạn</label><input type="date" name="end_time' +
                        number +
                        '" class="form-control"></div><div class="col-md-2"><label></label><a class="form-control  text-danger" onclick="delete_input(' +
                        number + ')" style="border:white"><i class="bi bi-trash"></i></a></div><br></div>'
                }
            });
        })

        function delete_input(number) {
            var new_arr = [];
            for (var i = 0; i < stt.length; i++) {
                if (stt[i] != number) {
                    new_arr[i] = stt[i]
                }
            }
            stt = new_arr
            // console.log(stt)
            $(".btnrow" + number).remove();
        }

        $(".submitForm").click(function () {
            for (var i = 0; i < stt.length; i++) {
                if (stt[i] != '') {

                }
            }
            let name = $("input[name*='name']").val();
            let desc = $("input[name*='desc']").val();
            let detail = $("input[name*='detail']").val();
            let category = $("select[name*='category']").val();
            let image = $("input[name*='image']").val();
            let status = $("select[name*='status']").val();
            let unit = $("input[name*='unit']").val();
        })
    </script>




@endsection
