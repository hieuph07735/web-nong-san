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
              <a href="{{route('product.list')}}" style="text-decoration: none">Danh sách sản phẩm</a>
            </li>
          </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header">
                Tạo mới sản phẩm
            </div>
            
            <div class="card-body">
                <form action="{{route('category.save')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="breadcrumb-item active">Tên sản phẩm</label>
                      <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="breadcrumb-item active">Mô tả</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div><br>
                      <div class="form-group">
                        <label for="exampleInputEmail1" class="breadcrumb-item active">Chi tiết</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
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
                        <label for="exampleFormControlSelect1" class="breadcrumb-item active">Danh mục</label>
                        <select class="form-control" name="type"> 
                          <option value="1" {{old('type') == 1 ?"selected":''}}>Sản phẩm</option>
                          <option value="2" {{old('type') == 2 ?"selected":''}}>Bài viết</option>
                        </select>
                        @error('type')
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
                        @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div><br>
                    <div class="form-group list_price ">
                        <div class= "row">
                           <div class ="col-md-1">
                               <label>Tên loại</label>
                               <input type="text" class="form-control" >
                           </div>
                           <div class ="col-md-2">
                               <label>Giá tiền</label>
                               <input type="number" class="form-control" >
                           </div>
                           <div class ="col-md-2">
                               <label>Giá giảm</label>
                               <input type="number" class="form-control" >
                           </div>
                           <div class ="col-md-2">
                               <label>Số lượng</label>
                               <input type="number"  min="1" class="form-control" >
                           </div>
                           <div class ="col-md-1">
                                <label>Đơn vị đo</label>
                                <input type="text" class="form-control" >
                           </div>
                           <div class ="col-md-2">
                                <label>Ngày hết hạn</label>
                                <input type="date" class="form-control" >
                            </div>
                           <div class ="col-md-1">
                               <label></label>
                               <a class="form-control btn btn-success add_input" >Thêm</a>
                           </div>
                        </div>
                    </div>

                  <br>
                    <button type="submit" class="btn btn-success">Tạo</button>
                  </form>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
    $(".add_input").click(function () {
      $('.list_price').append(function() {
         return '<br><div class= "row"><div class ="col-md-1"><input type="text" class="form-control" ></div><div class ="col-md-2"><input type="number" class="form-control" ></div><div class ="col-md-2"><input type="number" class="form-control" ></div><div class ="col-md-2"><input type="number"  min="1" class="form-control" ></div><div class ="col-md-1"><input type="text" class="form-control" ></div><div class ="col-md-2"><input type="date" class="form-control" ></div></div>'
     });
    })

</script>
@endsection



