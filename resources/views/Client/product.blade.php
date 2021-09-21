@extends('Client.main')
@section('title')
    Sản phẩm
@endsection
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Sản phẩm</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i
                                                class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i
                                                class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($data as $value)
                                            {{-- <a class="col-sm-6 col-md-6 col-lg-4 col-xl-4" href="{{route('products.detail', $value->product_id)}}"> --}}
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img style="width: 255px; height: 261px; object-fit: cover" src="{{asset($value->image)}}" class="img-fluid" alt="Image">
                                                    </div>
                                                    <div class="why-text">
                                                        <h4>
                                                            <a href="{{ route('product.detail', $value->id) }}">{{ $value->name }}</a>
                                                        </h4>
                                                        <h5>{{$value->price_entry}}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Shop Page -->


@endsection



