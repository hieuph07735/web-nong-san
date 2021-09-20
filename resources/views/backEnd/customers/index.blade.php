@extends('backend.layouts.app')

@section('title')
    Quản lý khách hàng
@endsection

@section('backend.layouts.content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách khách hàng</h4>
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
                                        Tên khác hàng
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Địa chỉ
                                    </th>
                                    <th>
                                        Điện thoại
                                    </th>
                                    <th>
                                        Ngày tạo
                                    </th>
                                    <th>
                                       Hành động
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
                                            {{ $item->address }}
                                        </td>
                                        <td class="text-left">
                                            {{ $item->phone }}
                                        </td>
                                        <td class="text-left">
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <form action="{{ route('customers.destroy', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="lfloat-right">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
