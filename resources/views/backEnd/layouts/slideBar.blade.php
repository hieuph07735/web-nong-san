<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="bi bi-clipboard-data"></i></div>
                    Thống kê
                </a>

                <div class="sb-sidenav-menu-heading">Quản lý</div>
                <a class="nav-link" href="{{route('user.index',['status'=>0])}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                    User
                </a>
                <a class="nav-link" href="{{route('category.index')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-bookmarks"></i></div>
                    Danh mục
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="bi bi-inboxes"></i></div>
                    Sản phẩm
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('type_product.index')}}">Loại sản phẩm</a>
                        <a class="nav-link" href="{{route('product.index',['status'=>0])}}">Sản phẩm</a>
                    </nav>
                </div>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                   Đơn hàng
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="bi bi-cash-coin"></i></div>
                    Voucher
                </a>

                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="bi bi-receipt"></i></div>
                    Bình luận
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="bi bi-phone-vibrate"></i></div>
                    Liên hệ
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đăng nhập với tư cách:</div>
            Quản trị viên
        </div>
    </nav>
</div>
