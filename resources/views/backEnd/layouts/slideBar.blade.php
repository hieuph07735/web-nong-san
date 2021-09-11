<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link @if (Route::is('get.home')) active @endif" href="{{ route('get.home') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-clipboard-data"></i></div>
                    Thống kê
                </a>
                <a class="nav-link @if (Route::is('introduct.index')) active @endif"
                    href="{{route('introduct.index')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-telephone-fill"></i></div>
                    Quản lí giới thiệu
                </a>
                <a class="nav-link  @if (Route::is('unit.index')) active @endif" href="{{ route('unit.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></i></div>
                    Quản lý nhà cung cấp
                </a>
                <a class="nav-link @if (Route::is('category.index')) active @endif"
                    href="{{ route('category.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-bookmarks"></i></div>
                    Quản lý danh mục
                </a>

                <!-- <a class="nav-link collapsed @if (Route::is('type_product.index') || Route::is('product.index')) active @endif"  href="active" 
                data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="true" aria-controls="collapseLayouts " id="a">
                    <div class="sb-nav-link-icon "><i class="bi bi-inboxes"></i></div>
                    Sản phẩm
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link @if (Route::is('type_product.index')) active @endif" href="{{route('type_product.index')}}">Loại sản phẩm</a>
                        <a class="nav-link @if (Route::is('product.index')) active @endif" href="{{route('product.index',['status'=>0])}}">Sản phẩm</a>
                        <a class="nav-link" href="{{route('variation-type.index')}}">Kiểu thuộc tính</a>
                    </nav>
                </div> -->                
                <a class="nav-link @if (Route::is('type_product.index')) active @endif"
                    href="{{ route('variation-type.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>Quản lý kiểu thuộc tính
                </a>
                <a class="nav-link @if (Route::is('type_product.index')) active @endif"
                    href="{{ route('type_product.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>Quản lý loại sản phẩm
                </a>
                <a class="nav-link @if (Route::is('product.index')) active @endif"
                    href="{{ route('product.index', ['status' => 0]) }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>Quản lý sản phẩm
                </a>

                <a class="nav-link @if (Route::is('inventory.index')) active @endif"
                    href="{{ route('inventory.index') }}">
                    <div class="sb-nav-link-icon"><i class=" bi-shop-window"></i></div>
                    Quản lý kho hàng
                </a>

                <a class="nav-link @if (Route::is('contact.index')) active @endif" href="{{route('contact.index')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-telephone-fill"></i></div>
                    Liên hệ
                </a>
            </div>
        </div>
    </nav>
</div>