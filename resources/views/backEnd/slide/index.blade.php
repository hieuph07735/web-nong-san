@extends('backend.layouts.app')

@section('title')
    Slide
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Danh Sách slide</h4>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table table-shopping">
                            <thead>
                                <tr>
                                    <th>
                                         ảnh slide
                                    </th>
                                    <th>
                                        tên slide
                                    </th>
                                   
                                    
                                    <th>
                                        trạng thái
                                    </th>
                                    <th>
                                        hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slide as $item)
                                    <tr>
                                        <td>
                                            <div class="img-container">

                                                <img src="{{ asset($item->image) }}" alt="..."
                                                    style="width:90px;height:75px;">
                                            </div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                       
                                        <td>
                                            <input id="checkbox{{$item->id}}" class="bootstrap-switch status_slide"  type="checkbox" data-toggle="switch" data-slideid="{{$item->id}}"
                                            
                                                {{ $item->status == 1 ? 'checked' : '' }} 
                                                data-on-label="<i class='nc-icon nc-check-2'></i>"
                                                data-off-label="<i class='nc-icon nc-simple-remove'></i>"
                                                data-on-color="success" data-off-color="success" />
                                        </td>
                                        <td>
                                            <a href="{{ route('slide.edit', $item->id) }}" class="btn btn-success">
                                              Edit
                                            </a>
                                            <a  class="btn btn-danger delete_slide" data-slideid="{{$item->id}}">Delete
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
    </div>
@endsection
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function () {
            // Bật tắt danh mục
            $('.status_slide').on('click', function () {
                var status = $(this).is(':checked');
                let id = $(this).data('slideid');
                let apiStatus = '{{route("slide.status")}}';
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
            $('.delete_slide').on('click', function () {
                let id = $(this).data('slideid');
                let apiDelete = '{{route("slide.delete")}}';
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
            
        })
  </script>
@endsection
