@extends('backEnd.layouts.main')
@section('title')
    Tạo mới giới thiệu
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
                        <a href="{{route('introduct.index')}}" style="text-decoration: none">Bài giới thiệu</a>
                    </li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    Tạo mới 
                </div>

                <div class="card-body">
                    <form action="{{route('introduct.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Tiêu đề</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title')}}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Nội dung</label>
                            <textarea  type="text" class="form-control" name="content" value="{{ old('content')}}"></textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="breadcrumb-item active">Ảnh</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
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

