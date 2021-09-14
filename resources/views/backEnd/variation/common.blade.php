@extends('backEnd.layouts.main')
@section('title')
    Thêm biến thể sản phẩm
@endsection
@section('content')
    <style>
        .custom-css {
            display: flex;
            align-items: center;
            padding-left: 30px;
        }
        .bi-x-circle-fill{
            color: red;
        }
        .m-t-30{
            margin-top: 20px;
        }
    </style>
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-body">
                        <p><strong>Tên sản phẩm : </strong>{{ $product->name }}</p>
                        <br>
                        <form action="{{route('variation.store')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="id">
                            <div class="control-group">
                                <div class="field-wrapper">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select name="var_type[]" id="" class="form-control">
                                                    <option selected value="null">-- Chọn kiểu --</option>
                                                    @foreach ($var_type as $key => $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="name[]" class="form-control" placeholder="Tên biến thể(VD:x,xl,xxl)">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="price[]" class="form-control" placeholder="Giá">
                                            </div>
                                            <div class="col-md-2 custom-css">
                                                <input type="number" name="quantity[]" class="form-control" placeholder="Số lượng">
                                                <a href="javascript:void(0);" class="add_button" title="Thêm">
                                                    <i class="bi bi-plus-circle-fill"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right float-left m-t-30">
                                <button class="btn btn-warning">Lưu Thuộc Tính</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-body">

                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Kiểu</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($variation as $key=>$value)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$value->variationtype->name}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->quantity}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field-wrapper'); //Input field wrapper
            var fieldHTML = '<div class="remove"><div class="row m-t-30"><div class="col-md-2"><select name="var_type[]" id="" class="form-control"><option value = "null"" selected>-- Chọn kiểu --</option>@foreach ($var_type as $key => $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></div><div class="col-md-3"><input type="text" name="name[]" class="form-control"></div><div class="col-md-3"><input type="number" name="price[]" class="form-control"></div><div class="col-md-2 custom-css"><input type="number" name="quantity[]" class="form-control"><a href="javascript:void(0);" class="remove_button" title="Gỡ"><i class="bi bi-x-circle-fill"></i></i></a></div></div></div>'; //New input field html 
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
               
                if (x < maxField) {

                    console.log('hello');
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $('div.remove').remove();
                // $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>

@endsection
