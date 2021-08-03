@extends('backEnd.layouts.main')
@section('title')
Danh sách sản phẩm
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
            </ol>
          </nav>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{route('product.create')}}" class="btn btn-success">Thên mới</a>
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Loại</th>
                            <th>Ảnh</th>
                            <th>Ngày sản xuất</th>
                            <th>Hạn sử dụng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Loại</th>
                            <th>Ảnh</th>
                            <th>Ngày sản xuất</th>
                            <th>Hạn sử dụng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- @foreach($data as $key=>$value)
                        <tr id="cate{{$value->id}}">
                            <td>{{$value->name}}</td>
                            <td>
                                @if($value->type == 1)
                                <span class="badge rounded-pill bg-success">Sản phẩm</span>
                                @else
                                <span class="badge rounded-pill bg-info text-dark">Bài viết</span>
                                @endif
                            </td>
                            <td><img src="{{$value->image}}" style="width: 100px"></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input status_category" type="checkbox" data-categoryid="{{$value->id}}" {{$value->status == 1 ?"checked":''}}>
                                  </div>
                            </span>
                            </td>
                            <td><a href="{{route('category.edit',['id'=>$value->id])}}"><i class="bi bi-pencil text-warning"></i></a>
                                <a class="delete_category" data-categoryid="{{$value->id}}"><i class="bi bi-trash text-danger"></i></a>
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')

@endsection
