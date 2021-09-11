@extends('backEnd.layouts.main')
@section('title')
Danh sách giới thiệu
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Danh sách giới thiệu</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{route('introduct.create')}}" class="btn btn-success">Thêm mới</a>
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề </th>
                            <th>Nội dung</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $key=>$value)
                        <tr id="cate{{$value->id}}">
                            <td>{{$key + 1}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{$value->content}}</td>
                            <td><img src="{{$value->image}}" style="width: 100px"></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input status_introduct" type="checkbox"
                                        data-introductid="{{$value->id}}" {{$value->status == 1 ?"checked":''}}>
                                </div>
                                </span>
                            </td>
                            <td>
                                <a href="{{route('introduct.edit',['id'=>$value->id])}}">
                                    <i class="bi bi-pencil text-warning"></i>
                                </a>
                                <a class="delete_introduct" data-introductid="{{$value->id}}">
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
$(document).ready(function() {

            // Xoá danh mục
            $('.delete_introduct').on('click', function() {
                let id = $(this).data('introductid');
                let apiDelete = '{{route("introduct.delete")}}';
                swal({
                        title: "Xoá danh mục",
                        text: "Bạn chắc chắn muốn xoá danh mục này , chắc chắn ấn OK không đồng ý ấn cancel",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        alert(1);
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
                                success: function(response) {
                                    if (response.status == 0) {
                                        $("#cate" + id).remove();
                                    }
                                }

                            })

                        }
                    })
            })
        }
</script>
@endsection