@extends('Client.main')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"><img class="d-block w-100" src="{{$product->image}}"
                                                                   alt="First slide"></div>
                            {{--                            <div class="carousel-item"> <img class="d-block w-100" src="Client/images/big-img-02.jpg" alt="Second slide"> </div>--}}
                            {{--                            <div class="carousel-item"> <img class="d-block w-100" src="Client/images/big-img-03.jpg" alt="Third slide"> </div>--}}
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{$product->image}}" alt=""/>
                            </li>
                            {{--<li data-target="#carousel-example-1" data-slide-to="1">--}}
                            {{--<img class="d-block w-100 img-fluid" src="Client/images/smp-img-02.jpg" alt="" />--}}
                            {{--                            </li>--}}
                            {{--                            <li data-target="#carousel-example-1" data-slide-to="2">--}}
                            {{--                                <img class="d-block w-100 img-fluid" src="Client/images/smp-img-03.jpg" alt="" />--}}
                            {{--                            </li>--}}
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->name}}</h2>
                        @if($inventory->price_sale == 0)
                            <h5>{{$inventory->price}}</h5>
                        @else
                            <h5>
                                <del style="margin-right: 5px">{{number_format($inventory->price)}}VNĐ</del>{{$inventory->price_sale}}
                                VNĐ
                            </h5>
                        @endif
                        <p class="available-stock"><span> Số lượng trong kho còn: {{$inventory->amount}} </span>
                        <p>
                        <h4>Mô tả</h4>
                        <p>{{$product->description}}</p>
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <div class="form-group quantity-box">--}}
{{--                                    <label class="control-label">Quantity</label>--}}
{{--                                    <input class="form-control" value="0" min="0" max="{{$inventory->amount}}" type="number">--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <a class="btn hvr-hover" data-fancybox-close="" href="{{ route('add.one.cart', $product->id) }}">Buy New</a>
                                <a class="btn hvr-hover" data-fancybox-close="" href="{{ route('add.cart', $product->id) }}">Add to cart</a>
                            </div>
                        </div>

                        <div class="add-to-btn">
                            <div class="add-comp">
                                <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                            </div>
                            <div class="share-bar">
                                <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="card card-outline-secondary my-4" style="width: 100%">
                    <div class="card-header">
                        <h2>Product Reviews</h2>
                    </div>
                    <div class="card-body">
                        <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%"
                             data-numposts="5">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản phẩm nổi bật</h1>
                        <p>Dưới dây là sản phẩm nổi bật</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach($inventories as $inventory)
                            <div class="item">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <img style="width: 255px; height: 261px; object-fit: cover" src="{{$inventory->image}}" class="img-fluid" alt="Image">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                       title="View"><i
                                                            class="fas fa-eye"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                       title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                       title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <a class="cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4>{{$inventory->name_product}}</h4>
                                        <h5>{{$inventory->price}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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



