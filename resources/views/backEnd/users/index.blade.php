@extends('backend.layouts.app')

@section('title')
    Người dùng
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách tài khoản</h4>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table table-striped">
                            <thead class="text-primary">
                                <tr>
                                    <th class="text-left">
                                        #
                                    </th>
                                    <th>
                                        Tên người dùng
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Điện thoại
                                    </th>
                                    <th>
                                        Trạng thái
                                    </th>
                                    <th>
                                        Ngày tạo
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td class="text-left">
                                            {{ $item->phone }}
                                        </td>
                                        <td class="text-left">
                                            <span class="{{ $item->status == 0 ? 'btn btn-danger' : 'btn btn-success' }}">{{ $item->status == 0 ? 'deactive' : 'active' }}</span>
                                        </td>
                                        <td class="text-left">
                                            {{ $item->created_at }}
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
