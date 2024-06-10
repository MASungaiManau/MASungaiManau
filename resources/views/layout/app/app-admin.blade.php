<!doctype html>
<html lang="en">

<head>
    @include('layout.header')
</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            @include('layout.navbar.navbar-admin')
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        @include('layout.sidebar.sidebar-admin')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('admin')

                </div>
                <!-- end container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layout.footer')

        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('layout.script')
</body>

</html>
