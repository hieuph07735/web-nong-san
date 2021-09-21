@extends('backend.layouts.app')

@section('title')
    Sản phẩm
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Danh Sách Sản Phẩm</h4>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table table-shopping">
                            <thead>
                                <tr>
                                    <th>
                                        ảnh sản phẩm
                                    </th>
                                    <th>
                                        Mã sản phẩm
                                    </th>
                                    <th>
                                        tên sản phẩm
                                    </th>
                                    <th>
                                        loại sản phẩm
                                    </th>
                                    <th>
                                        nhà cung cấp
                                    </th>
                                    <th>
                                        giá nhập
                                    </th>
                                    <th>
                                        mô tả
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
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <div class="img-container">

                                                <img src="{{ asset($item->image) }}" alt="..."
                                                    style="width:90px;height:75px;">
                                            </div>
                                        </td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            {{ $item->price_entry }}
                                        </td>
                                        <td>
                                            {{ $item->description }}
                                        </td>
                                        <td>
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-id="{{$item->id}}"
                                                {{ $item->status == 1 ? 'checked' : '' }}
                                                data-on-label="<i class='nc-icon nc-check-2'></i>"
                                                data-off-label="<i class='nc-icon nc-simple-remove'></i>"
                                                data-on-color="success" data-off-color="success" />
                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-success">
                                               edit
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
<script>

    $(function() {
      $('.bootstrap-switch').change(function() {
  
          var status = $(this).prop('checked') == true ? 1 : 0; 
  
          var pro_id = $(this).data('id'); 
  
          $.ajax({
  
              type: "POST",
  
              dataType: "json",
  
              url: '{{route('products.status')}}',
  
              data: {'status': status, 'pro_id': pro_id},
  
              success: function(data){
  
                console.log(data.success)
  
              }
  
          });
  
      })
  
    })
  
  </script>
@endsection
