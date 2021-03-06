@extends('backend.layouts.app')

@section('title')
    Loại Sản Phẩm
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <a href="{{route('type_product.create')}}" class="btn btn-success">Thêm mới</a>
                    <h4 class="card-title"> Danh Sách Loại Sản Phẩm</h4>
                </div>
                <div class="card-body">
                    <table class="table table-shopping">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                    
                        <tbody>
                        @foreach($datas as $key=>$value)
                            <tr id="cate{{$value->id}}">
                                <td>{{$key + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->description}}</td>
                                <td>{{$value->name_caterogy}}</td>
                               
                                <td><img src="{{ asset($value->image) }}" style="width: 100px"></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input status_type_product" type="checkbox"
                                               data-type_product_id="{{$value->id}}" {{$value->status == 1 ?"checked":''}}>
                                    </div>
                                    </span>
                                </td>
                                <td> 
                                    <a href="{{ route('type_product.edit', $value->id) }}" class="btn btn-success">
                                               edit
                                     </a>
                                    <a class="delete_type_product" data-type_product_id="{{$value->id}}">
                                            <i class="btn btn-danger">Delete</i>
                                            </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
@endsection

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            // Bật tắt danh mục
            $('.status_type_product').on('click', function () {
                var status = $(this).is(':checked');
                let id = $(this).data('type_product_id');
                let apiStatus = '{{route("type_product.status")}}';
                swal({
                    title: "Đổi trạng thái danh mục",
                    text: "Bạn chắc chắn muốn đổi trạng thái danh mục , chắc chắn ấn OK không đồng ý ấn cancel",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: apiStatus,
                                method: "POST",
                                data: {
                                    id: id,
                                    _token: '{{csrf_token()}}'
                                },
                                dataType: 'json',
                                success: function (response) {
                                    if (response.status == 2) {
                                        if (status == true) {
                                            $(this).prop('checked', true);
                                        } else {
                                            $(this).prop('checked', false);
                                        }
                                    }
                                }
                            })
                        } else {
                            if (status == true) {
                                $(this).prop('checked', false);
                            } else {
                                $(this).prop('checked', true);
                            }
                        }
                    })
            })
            // Xoá danh mục
            $('.delete_type_product').on('click', function () {
                let id = $(this).data('type_product_id');
                let apiDelete = '{{route("type_product.delete")}}';
                swal({
                    title: "Xoá danh mục",
                    text: "Bạn chắc chắn muốn xoá danh mục này , chắc chắn ấn OK không đồng ý ấn cancel",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            // swal("Thành công", "Bạn đã tạo mới thành công danh mục", "success")
                            $.ajax({
                                url: apiDelete,
                                method: "POST",
                                data: {
                                    id: id,
                                    _token: '{{csrf_token()}}'
                                },
                                dataType: 'json',
                                success: function (response) {
                                    if (response.status == 1) {
                                        $("#cate" + id).remove();
                                    }
                                }
                            })
                        }
                    })
            })
            var status = "{{$status}}";
            if (status == 1) {
                swal("Thành công", "Bạn đã tạo mới thành công danh mục", "success");
            } else if (status == 2) {
                swal("Thất bại", "Lỗi không thể tạo danh mục này", "error");
            } else if (status == 3) {
                swal("Thành công", "Sửa danh mục thành công", "success");
            } else if (status == 4) {
                swal("Thất bại", "Lỗi không sửa đươc danh mục này", "error");
            }
        })
    </script>
@endsection