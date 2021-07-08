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
                <a class="nav-link" href="{{route('user.list',['status'=>0])}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                    User
                </a>
                <a class="nav-link" href="{{route('category.list')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-bookmarks"></i></div>
                    Danh mục
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="bi bi-bank"></i></div>
                    Kho hàng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Nông sản tồn</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Nhập nông sản</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Nông sản sắp hết hạn</a>
                    </nav>
                </div>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="bi bi-cart4"></i></div>
                   Đơn hàng
                </a>
                <a class="nav-link" href="{{route('product.list')}}">
                    <div class="sb-nav-link-icon"><i class="bi bi-inboxes"></i></div>
                    Sản phẩm
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