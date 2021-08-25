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
                <a href="{{route('product_create')}}" class="btn btn-success">Thêm mới</a>
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Nhà cung cấp</th>
                            <th>Giá nhập sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Nhà cung cấp</th>
                            <th>Giá nhập sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($datas as $key=>$value)
                        <tr id="pr{{$value->id}}">
                            <td>{{$key + 1}}</td>
                            <td>{{$value->code}}</td>
                            <td>{{$value->name}}</td>
                            <?php
                                $type_pr = DB::table('type_products')->get();
                                ?>
                            <td>
                                @foreach( $type_pr as $item)
                                @if($item->id == $value->type_product_id)
                                <span class="badge rounded-pill bg-info text-dark">{{$item->name}}</span>

                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach( $unit_product as $item)
                                @if($item->id == $value->unit_id)
                                <span class="badge rounded-pill bg-info text-dark">{{$item->name}}</span>

                                @endif
                                @endforeach
                            </td>
                            <td>{{$value->price_entry}}</td>
                            <td>{{$value->description}}</td>

                            <td><img src="{{$value->image}}" style="width: 100px"></td>

                            <td>
                                <div class="form-check form-switch">
                                    <input onclick="statusPr({{$value->id}})" class="form-check-input" type="checkbox"
                                        {{$value->status == 1 ?"checked":''}} id="checkbox{{$value->id}}">
                                </div>
                                </span>
                            </td>
                            <td>
                                <a href="{{route('product.edit',['id'=>$value->id])}}">
                                    <i class="bi bi-pencil text-warning"></i>
                                </a>
                                <a href="{{route('product.detail')}}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a onclick="deletePr({{$value->id}})">
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
var status = "<?php echo $status; ?>";
if (status == 1) {
    swal("Thành công", "Bạn đã tạo mới thành công sản phẩm", "success");
} else if (status == 2) {
    swal("Thành công", "Sửa sản phẩm thành công", "success");
}


// Đổi trạng thái sản phẩm
function statusPr(id) {
    var status = document.getElementById("checkbox" + id).checked;
    let pr_id = id;
    let apiStatus = '{{route("product.status")}}';

    swal({
            title: "Đổi trạng thái sản phẩm",
            text: "Bạn chắc chắn muốn đổi trạng thái sản phẩm , chắc chắn ấn OK không đồng ý ấn cancel",
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
                        id: pr_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 2) {
                            if (status == true) {
                                document.getElementById("checkbox" + id).checked = true;
                            } else {
                                document.getElementById("checkbox" + id).checked = false;
                            }
                        }
                    }

                })

            } else {
                if (status == true) {
                    document.getElementById("checkbox" + id).checked = false;
                } else {
                    document.getElementById("checkbox" + id).checked = true;
                }
            }
        })
}


// Xoá sản phẩm
function deletePr(id) {
    let id_pr = id;
    let apiDelete = '{{route("product.delete")}}';
    swal({
            title: "Xoá sản phẩm",
            text: "Bạn chắc chắn muốn xoá sản phẩm này , chắc chắn ấn OK không đồng ý ấn cancel",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // swal("Thành công", "Bạn đã tạo mới thành công sản phẩm", "success")
                $.ajax({
                    url: apiDelete,
                    method: "POST",
                    data: {
                        id: id_pr,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 1) {
                            $("#pr" + id_pr).remove();
                        }
                    }

                })

            }
        })
}
</script>
@endsection