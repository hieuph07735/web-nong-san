<div class="sidebar" data-color="default" data-active-color="danger">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color=" default | primary | info | success | warning | danger |"
  -->
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('backend/assets/img/faces/ayo-ogunseinde-2.jpg')}}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapse Example" class="collapsed">
                    <span>
                        {{Auth::user()->name}}
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="nc-icon nc-bank"></i>
                    <p>tổng quan</p>
                </a>
            </li>
            <li>
                <a href="{{route('users.index')}}">
                    <i class="nc-icon nc-calendar-60"></i>
                    <p>tài khoản</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>
                        sản phẩm <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="pagesExamples">
                    <ul class="nav">
                        <li>
                            <a href="{{route('products.index')}}">
                                <span class="sidebar-mini-icon">D</span>
                                <span class="sidebar-normal"> danh sách </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('products.create')}}">
                                <span class="sidebar-mini-icon">T</span>
                                <span class="sidebar-normal">tạo mới</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{route('customers.index')}}">
                    <i class="nc-icon nc-calendar-60"></i>
                    <p>Khách hàng</p>
                </a>
            </li>
            <li>
                <a href="{{route('orders.index')}}">
                    <i class="nc-icon nc-calendar-60"></i>
                    <p>Đơn hàng</p>
                </a>
            </li>
            {{-- <li>
                <a data-toggle="collapse" href="#componentsExamples">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>
                        Components <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="componentsExamples">
                    <ul class="nav">
                        <li>
                            <a href="components/buttons.html">
                                <span class="sidebar-mini-icon">B</span>
                                <span class="sidebar-normal"> Buttons </span>
                            </a>
                        </li>
                        <li>
                            <a href="components/grid.html">
                                <span class="sidebar-mini-icon">G</span>
                                <span class="sidebar-normal"> Grid System </span>
                            </a>
                        </li>
                        <li>
                            <a href="components/panels.html">
                                <span class="sidebar-mini-icon">P</span>
                                <span class="sidebar-normal"> Panels </span>
                            </a>
                        </li>
                        <li>
                            <a href="components/sweet-alert.html">
                                <span class="sidebar-mini-icon">SA</span>
                                <span class="sidebar-normal"> Sweet Alert </span>
                            </a>
                        </li>
                        <li>
                            <a href="components/notifications.html">
                                <span class="sidebar-mini-icon">N</span>
                                <span class="sidebar-normal"> Notifications </span>
                            </a>
                        </li>
                        <li>
                            <a href="components/icons.html">
                                <span class="sidebar-mini-icon">I</span>
                                <span class="sidebar-normal"> Icons </span>
                            </a>
                        </li>
                        <li>
                            <a href="components/typography.html">
                                <span class="sidebar-mini-icon">T</span>
                                <span class="sidebar-normal"> Typography </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#formsExamples">
                    <i class="nc-icon nc-ruler-pencil"></i>
                    <p>
                        Forms <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="formsExamples">
                    <ul class="nav">
                        <li>
                            <a href="forms/regular.html">
                                <span class="sidebar-mini-icon">RF</span>
                                <span class="sidebar-normal"> Regular Forms </span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/extended.html">
                                <span class="sidebar-mini-icon">EF</span>
                                <span class="sidebar-normal"> Extended Forms </span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/validation.html">
                                <span class="sidebar-mini-icon">V</span>
                                <span class="sidebar-normal"> Validation Forms </span>
                            </a>
                        </li>
                        <li>
                            <a href="forms/wizard.html">
                                <span class="sidebar-mini-icon">W</span>
                                <span class="sidebar-normal"> Wizard </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#tablesExamples">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>
                        Tables <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="tablesExamples">
                    <ul class="nav">
                        <li>
                            <a href="tables/regular.html">
                                <span class="sidebar-mini-icon">RT</span>
                                <span class="sidebar-normal"> Regular Tables </span>
                            </a>
                        </li>
                        <li>
                            <a href="tables/extended.html">
                                <span class="sidebar-mini-icon">ET</span>
                                <span class="sidebar-normal"> Extended Tables </span>
                            </a>
                        </li>
                        <li>
                            <a href="tables/datatables.net.html">
                                <span class="sidebar-mini-icon">DT</span>
                                <span class="sidebar-normal"> DataTables.net </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#mapsExamples">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>
                        Maps <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="mapsExamples">
                    <ul class="nav">
                        <li>
                            <a href="maps/google.html">
                                <span class="sidebar-mini-icon">GM</span>
                                <span class="sidebar-normal"> Google Maps </span>
                            </a>
                        </li>
                        <li>
                            <a href="maps/fullscreen.html">
                                <span class="sidebar-mini-icon">FSM</span>
                                <span class="sidebar-normal"> Full Screen Map </span>
                            </a>
                        </li>
                        <li>
                            <a href="maps/vector.html">
                                <span class="sidebar-mini-icon">VM</span>
                                <span class="sidebar-normal"> Vector Map </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="widgets.html">
                    <i class="nc-icon nc-box"></i>
                    <p>Widgets</p>
                </a>
            </li>
            <li>
                <a href="charts.html">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    <p>Charts</p>
                </a>
            </li> --}}

        </ul>
    </div>
</div>
