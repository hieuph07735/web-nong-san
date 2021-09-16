@extends('Client.main')
@section('title')
    Giỏ hàng
@endsection
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Giỏ Hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Xóa giỏ hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['amount'] @endphp
                                    <tr data-id="{{$id}}">
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ $details['image'] }}" alt=""/>
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ $details['name'] }}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>${{ $details['price'] }}</p>
                                        </td>
                                        <td data-th="amount" class="quantity-box">
                                            <input type="number"
                                                   size="4"
                                                   value="{{$details['amount'] }}"
                                                   min="0"
                                                   step="1"
                                                   class="c-input-text qty text update-cart amount"></td>
                                        <td class="total-pr">
                                            <p>${{ $details['price'] * $details['amount'] }}</p>
                                        </td>
                                        <td class="remove-pr">
                                            <a class="remove-cart">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">

                </div>
                <hr class="my-1">
                <h4>Shipping Cost</h4>
                <div class="ml-auto font-weight-bold">Miễn phí vẫn chuyển</div>
            </div>
            <hr>
            <div class="d-flex gr-total">
                <h5>Grand Total</h5>
                <div class="ml-auto h5">${{ $total }}</div>
            </div>
            <hr>
        </div>
    </div>
    <div class="col-12 d-flex shopping-box"><a href="" class="ml-auto btn hvr-hover">Thanh toán</a></div>
    </div>

    </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-01.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-02.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-03.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-04.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-05.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-06.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-07.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-08.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-09.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-05.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

@endsection



