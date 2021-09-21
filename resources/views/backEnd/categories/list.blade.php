@extends('backend.layouts.app')

@section('title')
Danh mục
@endsection

@section('backend.layouts.content')

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <a href="{{route('category.create')}}" class="btn btn-success">Thêm mới</a>
                <h4 class="card-title"> Danh Mục Sản Phẩm</h4>
            </div>
            
               
           
            <div class="card-body">
            <table class="table table-shopping">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
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
                            <td><img src="{{asset($value->image)}}" style="width: 100px"></td>
                            <td>
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-id="{{$value->id}}"
                                                {{ $value->status == 1 ? 'checked' : '' }}
                                                data-on-label="<i class='nc-icon nc-check-2'></i>"
                                                data-off-label="<i class='nc-icon nc-simple-remove'></i>"
                                                data-on-color="success" data-off-color="success" />
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', $value->id) }}" class="btn btn-success">
                                               edit
                                            </a>
                                            <a class="delete_category" data-categoryid="{{$value->id}}">
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
</div>

@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    // Bật tắt danh mục
    $('.status_category').on('click', function() {
        var status = $(this).is(':checked');
        let id = $(this).data('categoryid');
        let apiStatus = '{{route("category.status")}}';
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
                        success: function(response) {
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
    $('.delete_category').on('click', function() {
        let id = $(this).data('categoryid');
        let apiDelete = '{{route("category.delete")}}';
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
                        success: function(response) {
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