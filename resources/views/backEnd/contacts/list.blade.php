@extends('backEnd.layouts.main')
@section('title')
    Danh sách liên hệ
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Danh sách liên hệ</li>
                </ol>
            </nav>

            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
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
                                                <a href="{{ route('un-active', $value->id) }}">
                                                    <span class="label label-primary">Chưa xử lý</span></a>
                                            @endif
                                            @if ($value->status == 2)
                                                <a href="{{ route('active', $value->id) }}">
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
    </main>
@endsection
