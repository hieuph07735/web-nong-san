@extends('backEnd.layouts.main')
@section('title')
    Danh sách số lượng sản phẩm
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Danh sách số lượng sản phẩm</li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{route('inventory.create')}}" class="btn btn-success">Thêm mới</a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Giá giảm</th>
                            <th>Ngày nhập</th>
                            <th>Hạn sử dụng</th>
                            <th>Nhà cung cấp</th>
                            <th>Người nhập hàng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Giá giảm</th>
                            <th>Ngày nhập</th>
                            <th>Hạn sử dụng</th>
                            <th>Nhà cung cấp</th>
                            <th>Người nhập hàng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($inventories as $key => $inventory)
                            <tr id="cate{{$inventory->id}}">
                                <td>{{$key + 1}}</td>
                                <td>{{$inventory->name_product}}</td>
                                <td>{{$inventory->amount}}</td>
                                <td>{{$inventory->price}}</td>
                                <td>{{$inventory->price_sale}}</td>
                                <td>{{$inventory->date_add}}</td>
                                <td>{{$inventory->expiry}}</td>
                                <td>{{$inventory->unit_id}}</td>
                                <td>{{$inventory->name_user}}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <label>
                                            <input class="form-check-input change_status" type="checkbox"
                                                   data-id="{{$inventory->id}}" {{$inventory->status == 0 ?"checked":''}}>
                                        </label>
                                    </div>
                                </td>
                                <td><a href="{{route('inventory.edit',['id'=>$inventory->id])}}">
                                        <i class="bi bi-pencil text-warning"></i>
                                    </a>
                                    <a class="delete" data-id="{{$inventory->id}}">
                                        <i class="bi bi-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        $(document).ready(function () {
            // Bật tắt danh mục
            $('.change_status').on('click', function () {
                var status = $(this).is(':checked');
                let id = $(this).data('id');
                let apiStatus = '{{route("inventory.status")}}';

                swal({
                    title: "Đổi trạng thái danh mục",
                    text: "Bạn chắc chắn muốn đổi trạng thái",
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
                                    if (response.status === 2) {
                                        if (status === true) {
                                            $(this).prop('checked', true);
                                        } else {
                                            $(this).prop('checked', false);
                                        }
                                    }
                                }

                            })

                        } else {
                            if (status === true) {
                                $(this).prop('checked', false);
                            } else {
                                $(this).prop('checked', true);
                            }
                        }
                    })
            })

            // Xoá danh mục
            $('.delete').on('click', function () {
                let id = $(this).data('id');
                let apiDelete = '{{route("inventory.destroy")}}';
                swal({
                    title: "Xoá danh mục",
                    text: "Bạn chắc chắn muốn xoá mục này",
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
                                    if (response.status === 1) {
                                        $("#cate" + id).remove();
                                    }
                                }

                            })

                        }
                    })
            })

            const status = "{{$status}}";
            if (status === 1) {
                swal("Thành công", "Bạn đã tạo mới thành công danh mục", "success");
            } else if (status === 2) {
                swal("Thất bại", "Lỗi không thể tạo danh mục này", "error");
            } else if (status === 3) {
                swal("Thành công", "Sửa danh mục thành công", "success");
            } else if (status === 4) {
                swal("Thất bại", "Lỗi không sửa đươc danh mục này", "error");
            }
        })
    </script>
@endsection

