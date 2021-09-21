@extends('Client.main')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            @if (isset($slide))
                @foreach ($slide as $slide)
                    <li class="text-center">
                        <img src="{{ asset($slide->image) }}" alt="">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="m-b-20"><strong>Xin chào bạn đến với <br> Cửa hàng nông sản Thanh
                                            Xuân</strong>
                                    </h1>
                                    <p class="m-b-40"><br></p>
                                    <p><a class="btn hvr-hover" href="{{ route('product') }}">Mua ngay</a></p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                @if (isset($product_type))
                    @foreach ($product_type as $type)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="shop-cat-box">
                                <img class="img-fluid" style="width: 348px; height: 246px; object-fit: cover"
                                    src="{{ $type->image }}" alt="" />
                                <a class="btn hvr-hover"
                                    href="{{ route('get.pr.type', $type->id) }}">{{ $type->name }}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <div class="box-add-products">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="offer-box-products">
                        <img class="img-fluid" src="Client/images/add-img-01.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="offer-box-products">
                        <img class="img-fluid" src="Client/images/add-img-02.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản phẩm nổi bật</h1>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @if (isset($products))
                    @foreach ($products as $key => $item)
                        <div class="col-lg-3 col-md-6 special-grid best-seller">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img style="width: 255px; height: 261px; object-fit: cover"
                                        src="{{ asset($item->image) }}" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li>
                                                <a href="{{ route('product.detail', $item->id) }}" data-toggle="tooltip"
                                                    data-placement="right" title="Chi tiết">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <a class="cart" href="{{ route('add.cart', $item->id) }}">Thêm vào giỏ
                                            hàng</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>
                                        <a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                                    </h4>
                                    <h5>{{ $item->price_entry }}VNĐ</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="Client/images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->
@endsection
