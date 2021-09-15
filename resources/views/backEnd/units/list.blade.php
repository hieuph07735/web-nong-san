@extends('backEnd.layouts.main')
@section('title')
    Danh sách nhà cung cấp
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Danh sách nhà cung cấp</li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{route('unit.create')}}" class="btn btn-success">Thêm mới nhà cung cấp</a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($datas as $key=>$value)
                            <tr id="cate{{$value->id}}">
                                <td>{{$key + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->address}}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input status_unit" type="checkbox"
                                               data-unitid="{{$value->id}}" {{$value->status == 1 ?"checked":''}}>
                                    </div>
                                    </span>
                                </td>
                                <td><a href="{{route('unit.edit',['id'=>$value->id])}}">
                                        <i class="bi bi-pencil text-warning"></i>
                                    </a>
                                    <a class="delete_unit" data-unitid="{{$value->id}}">
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
            $('.status_unit').on('click', function () {
                var status = $(this).is(':checked');
                let id = $(this).data('unitid');
                let apiStatus = '{{route("unit.status")}}';

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
            $('.delete_unit').on('click', function () {
                let id = $(this).data('unitid');
                let apiDelete = '{{route("unit.delete")}}';
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

            var status = "<?php echo $status; ?>";
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
