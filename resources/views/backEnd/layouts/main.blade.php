<div class="main-panel">

    <!-- Include Navbar -->
    @include('backend.layouts.navbar')
    <!-- End Include Navbar -->

    <div class="content">
        <!-- Yield Content -->
        @yield('backend.layouts.content')
        <!-- End Yield Content -->
    </div>
    <footer class="footer footer-black  footer-white ">
        <!-- Include Footer -->
        @include('backend.layouts.footer')
        <!-- End Include Footer -->
    </footer>
</div>
