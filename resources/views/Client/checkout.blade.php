@extends('Client.main')
@section('title')
    Thanh Toán
@endsection
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Cửa hàng</a></li>
                        <li class="breadcrumb-item active">Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <form action="{{ route('post.checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Thông tin người mua</h3>
                            </div>
                            <div class="mb-3">
                                <label for="full-name">Họ và tên *</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên" id="fullname" value=" {{old('name')}}">
                                <div class="invalid-feedback" style="width: 100%;">Họ tên của bạn là bắt buộc </div>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Địa chỉ email*</label>
                                <input type="email" class="form-control" name="email" placeholder="Email của bạn" value=" {{old('email')}}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ của bạn" value=" {{old('address')}}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại của bạn" value=" {{old('phone')}}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="note">Ghi Chú</label>
                                <textarea name="note" id="note" cols="30" rows="5" class="form-control" style="text-align: left !important">
                                    {{old('note')}}
                                </textarea>
                            </div>
                            <hr class="mb-4">
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Giỏ hàng </h3>
                                    </div>
                                    <div class="rounded p-2 bg-light">
                                        @php $total = 0 @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['amount'] @endphp

                                                <div class="media mb-2 border-bottom">
                                                    <div class="media-body">
                                                        <a href="detail.html">{{ $details['name'] }}</a>
                                                        <div class="small text-muted">
                                                            <b>Giá: </b> {{ $details['price'] }}
                                                            <span class="mx-2">|</span>
                                                            <b>Số Lượng: </b>{{ $details['amount'] }}
                                                            <span class="mx-2">|</span>
                                                            <b>Tổng số
                                                                phụ: </b>{{ $details['price'] * $details['amount'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <div class="title-left">
                                        <h3>Đơn hàng của bạn</h3>
                                    </div>
                                    <hr>
                                    <div class="d-flex gr-total">
                                        <h5>Tổng cộng</h5>
                                        @if (session('cart'))
                                            <input type="hidden" name="total" value="{{ $total }}">
                                        @endif
                                        <div class="ml-auto h5">{{ $total }}</div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            {{-- <div class="col-12 d-flex shopping-box"> 
                                <a href="checkout.html" class="ml-auto btn hvr-hover">Place Order</a>
                            </div> --}}
                            <div class="col-12 d-flex shopping-box">
                                <button type="submit" class="ml-auto btn btn-success" style="width:120px;">Đặt Hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Cart -->
@endsection
