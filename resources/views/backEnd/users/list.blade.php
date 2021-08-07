@extends('backEnd.layouts.main')
@section('title')
    Danh sách tài khoản
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Danh sách tài khoản</li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{ route('user.create') }}" class="btn btn-success">Thên mới</a>
                </div>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Sđt</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Sđt</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr id="user{{ $value->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td><img src="{{ $value->avatar }}" style="width: 100px"></td>
                                    <td>
                                        @if ($value->role == 0)
                                            <span class="badge rounded-pill bg-info">Khách hàng</span>
                                        @else
                                            <span class="badge rounded-pill bg-info text-dark">Quản trị</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($value->status == 0)
                                            <span class="badge rounded-pill bg-success">Hoạt động</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Tạm ngưng</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('user.edit', ['id' => $value->id]) }}"><i
                                                class="bi bi-pencil text-warning"></i></a>
                                        <a class="delete_user" data-userid="{{ $value->id }}"><i
                                                class="bi bi-trash text-danger"></i></a>
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
        $(document).ready(function() {
            // Xoá danh mục
            $('.delete_user').on('click', function() {
                let id = $(this).data('userid');
                let apiDelete = '{{ route("user.delete") }}';
                swal({
                        title: "Xoá tài khoản",
                        text: "Bạn chắc chắn muốn xoá tài khoản này , chắc chắn ấn OK không đồng ý ấn cancel",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: apiDelete,
                                method: "POST",
                                data: {
                                    id: id,
                                    _token: '{{ csrf_token() }}'
                                },
                                dataType: 'json',
                                success: function(response) {
                                    if (response.status == 1) {
                                        $("#user" + id).remove();
                                    }
                                }

                            })

                        }
                    })
            })
            var status = "<?php echo $status; ?>";
            if (status == 1) {
                swal("Thành công", "Bạn đã tạo mới thành công tài khoản", "success");
            } else if (status == 2) {
                swal("Thất bại", "Lỗi không thể tạo tài khoản này", "error");
            } else if (status == 3) {
                swal("Thành công", "Sửa tài khoản thành công", "success");
            } else if (status == 4) {
                swal("Thất bại", "Lỗi không sửa đươc tài khoản này", "error");
            }
        })
    </script>
@endsection
