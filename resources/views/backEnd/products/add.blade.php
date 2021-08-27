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
                        <a href="{{route('product.index',['status'=>0])}}" style="text-decoration: none">Danh sách sản phẩm</a>
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
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Loại sản phẩm</label>
                            <select class="form-control mul-select" name="type_product_id">
                                @foreach ($type_product as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('type_product_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_product_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Nhà cung cấp </label>
                            <select class="form-control mul-select" name="unit_id">
                                @foreach ($unit_product as $value)
                                    <option value="{{ $value->id }}"
                                        {{ old('unit_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('unit_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="price_entry" value="{{ old('price_entry')}}">
                            @error('price_entry')
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
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Ảnh</label>
                            <input type="file" class="form-control" name="image[]" multiple accept="image/*" onchange="loadFile(event)">
                            <img id="output" style="width: 200px;"/>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Trạng thái</label>
                            <select class="form-control" name="status" >
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
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('select').select2();
        CKEDITOR.replace('descCk');
    </script>
    <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection

