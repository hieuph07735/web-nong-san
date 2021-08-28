@extends('backEnd.layouts.main')
@section('title')
    Thêm số lượng sản phẩm
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
                        <a href="{{route('inventory.index')}}" style="text-decoration: none">Danh sách số lượng sản phẩm</a>
                    </li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    Tạo mới số lượng sản phẩm
                </div>

                <div class="card-body">
                    <form action="{{route('inventory.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="breadcrumb-item active">Sản phẩm</label>
                            <select class="form-control mul-select" name="product_id">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('product_id') == $product->id ? 'selected' : '' }}>{{$product->code}} - {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Số lượng</label>
                            <input type="number" min="0" class="form-control" name="amount" value="{{ old('amount')}}">
                            @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Giá</label>
                            <input type="number" min="0" class="form-control" name="price" value="{{ old('price')}}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Giá giảm</label>
                            <input type="number" min="0" class="form-control" name="price_sale" value="{{ old('price_sale')}}">
                            @error('price_sale')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Giá giảm</label>
                            <input type="date" class="form-control" name="date_add" value="{{ old('date_add')}}">
                            @error('date_add')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Số ngày hết hạn</label>
                            <input type="number" min="0" class="form-control" name="expiry" value="{{ old('expiry')}}">
                            @error('expiry')
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
@section('js')
@endsection

