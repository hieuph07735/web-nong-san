@extends('backend.layouts.app')

@section('title')
    Danh mục
@endsection

@section('backend.layouts.content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('category.create') }}" class="btn btn-success">Thêm mới</a>
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
                            @foreach ($datas as $key => $value)
                                <tr id="cate{{ $value->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td><img src="{{ asset($value->image) }}" style="width: 100px"></td>
                                    <td>
                                        <input class="bootstrap-switch" type="checkbox" data-toggle="toggle"
                                            data-id="{{ $value->id }}"
                                            data-on-label="<i class='nc-icon nc-check-2'></i>"
                                            data-off-label="<i class='nc-icon nc-simple-remove'></i>"
                                            data-on-color="success" data-off-color="success" data-on="Active"
                                            data-off="InActive" {{ $value->status == 1 ? 'checked' : '' }} />
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $value->id) }}" class="btn btn-success">
                                            edit
                                        </a>
                                        <a class="delete_category" data-categoryid="{{ $value->id }}">
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
<script>
    $(function() {
        $('.bootstrap-switch').on('switchChange.bootstrapSwitch', function(e, state) {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '{{ route('category.status') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    'status': status,
                    'id': product_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        });
    });
</script>
@endsection
