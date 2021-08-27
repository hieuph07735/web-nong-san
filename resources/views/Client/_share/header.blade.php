<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">

                </div>
                <div class="right-phone-box">
                    <p>Số điện thoại liên hệ :  <a href="#">0988.888.888</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        <li><a href="#"><i class="fas fa-location-arrow"></i> Vị trí cửa hàng</a></li>
                        <li><a href="#"><i class="fas fa-headset"></i> Liên hệ</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> Sale 20% với khách hàng thân thiết của cửa hàng
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Sale 30-50% với các loại rau mùa hè
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Sale 20% với 10 khách hàng duy nhất khi nhập mã voucher: TX5236541
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html"><img src="Client/images/favicon.ico" class="logo" alt="" style="width:150px"></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('about')}}">Giới thiệu</a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Sản phẩm</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('product')}}">Danh sách sản phẩm</a></li>
{{--                            <li><a href="{{route('product.detail')}}">Chi tiết sản phẩm</a></li>--}}
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">Danh mục sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Liên hệ</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="side-menu">
                        <a href="{{route('cart')}}">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
                            <p>Giỏ hàng</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <li>
                        <a href="#" class="photo"><img src="Client/images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Delica omtantur </a></h6>
                        <p>1x - <span class="price">$80.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="Client/images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Omnes ocurreret</a></h6>
                        <p>1x - <span class="price">$60.00</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="Client/images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Agam facilisis</a></h6>
                        <p>1x - <span class="price">$40.00</span></p>
                    </li>
                    <li class="total">
                        <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        <span class="float-right"><strong>Total</strong>: $180.00</span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
