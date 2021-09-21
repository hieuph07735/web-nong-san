@extends('backend.layouts.app')

@section('title')
   Liên hệ
@endsection

@section('backend.layouts.content')
    <div class="row">
   
                  
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Danh Sách Liên Hệ</h4>
                    
                
                </div><div class="card-body">
                    <table class="table table-shopping">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $value)
                                <tr id="pr{{ $value->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->content }}</td>
                                  
                                    <td>
                                        
                                        <span class="text-ellipsis">
                                            @if ($value->status == 1)
                                                <a href="{{ route('manage-contact.unactive', $value->id) }}">
                                                    <span class="label label-primary">Chưa xử lý</span></a>
                                            @endif
                                            @if ($value->status == 2)
                                                <a href="{{ route('manage-contact.active', $value->id) }}">
                                                    <span class="label label-danger">Đã xử lý</span>
                                                </a>
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection